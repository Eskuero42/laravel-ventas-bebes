<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Articulo;
use App\Models\Especificacion;
use App\Models\Catalogo;
use App\Models\ProductoTipo;
use GuzzleHttp\Handler\Proxy;
use App\Models\Posicion;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ArticulosController extends Controller
{
    public function articuloslistar($producto_id)
    {
        $producto = Producto::with('categoria', 'detalles', 'producto_tipos.tipo.especificaciones')->findOrFail($producto_id);
        $articulos = Articulo::with(['catalogos.especificacion'])
            ->where('producto_id', $producto_id)
            ->get();


        return view('layouts.admin.articulos.listar', compact('producto', 'articulos'));
    }

    public function registrararticulo(Request $request)
    {
        //\Log::info($request->all());
        //exit;
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descuento' => 'nullable|numeric|min:0',
            'descuento_porcentaje' => 'nullable|numeric|min:0|max:100',
            'producto_id' => 'required|exists:productos,id',
            'extension' => 'nullable|string|max:255',
            'fecha_vencimiento' => 'nullable|date',
            'imagen' => 'required|array|min:1',
            'imagen.*' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        // Obtener el código base del producto
        $producto = Producto::findOrFail($request->producto_id);

        $ultimoArticulo = $producto->articulos()->latest('codigo')->get();

        if ($ultimoArticulo) {
            $cantidad = count($ultimoArticulo);
            $codigo = $cantidad + 1;
        } else {

            $codigo = 1;
        }
        if ($request->precio_radio == 'nuevo') {
            $precio = $request->precio_nuevo;
        } else {
            $precio = $request->precio_actual;
        }
        $articulo = Articulo::create([
            'codigo' => $codigo,
            'nombre' => $request->nombre,
            'precio' => $precio,
            'descuento' => $request->input('descuento', 0),
            'descuento_porcentaje' => $request->descuento_porcentaje ?? 0,
            'descuento_habilitado' => ($request->descuento > 0 || $request->descuento_porcentaje > 0),
            'estado' => 'vigente',
            'fecha_vencimiento' => $request->fecha_vencimiento ? $request->fecha_vencimiento : null,
            'producto_id' => $request->producto_id,
        ]);

        // Especificaciones
        if ($request->has('especificaciones')) {
            foreach ($request->especificaciones as $tipo_id => $especificacion_id) {
                Catalogo::create([
                    'articulo_id' => $articulo->id,
                    'tipo_id' => $tipo_id,
                    'especificacion_id' => $especificacion_id,
                ]);
            }
        }

        if ($request->hasFile('imagen')) {
            foreach ($request->file('imagen') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $destinationPath = public_path('archivos/articulos');
                $file->move($destinationPath, $fileName);

                // Guardar la ruta relativa en la base de datos
                Posicion::create([
                    'imagen' => 'archivos/articulos/' . $fileName,
                    'articulo_id' => $articulo->id,
                ]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Artículo registrado correctamente.']);
    }

    public function editarArticulo(Request $request)
    {
        $articulo = Articulo::findOrFail($request->id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'descuento' => 'nullable|numeric|min:0',
            'descuento_porcentaje' => 'nullable|numeric|min:0|max:100',
            'fecha_vencimiento' => 'nullable|date',
            'imagen.*' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $articulo->update([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'descuento' => $request->input('descuento', 0),
            'descuento_porcentaje' => $request->descuento_porcentaje ?? 0,
            'descuento_habilitado' => ($request->descuento > 0 || $request->descuento_porcentaje > 0),
            'fecha_vencimiento' => $request->fecha_vencimiento,
        ]);

        if ($request->has('especificaciones')) {
            foreach ($request->especificaciones as $tipoId => $especificacionId) {
                Catalogo::updateOrCreate(
                    [
                        'articulo_id' => $articulo->id,
                        'tipo_id' => $tipoId,
                    ],
                    [
                        'especificacion_id' => $especificacionId,
                    ]
                );
            }
        }

        return response()->json(['success' => true, 'message' => 'Artículo actualizado correctamente.']);
    }
}
