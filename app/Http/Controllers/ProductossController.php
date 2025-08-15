<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Tipo;
use Illuminate\Http\Request;
use App\Models\Especificacion;
use App\Models\ProductoTipo;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductossController extends Controller
{
    public function productosver()
    {
        return view('layouts.admin.productos.ver');
    }

    public function productosvertodos($id)
    {

        $categoria = Categoria::findOrFail($id);
        //$subcategorias = Categoria::where('categoria_id', $id)->get();
        //$productos = Producto::where('categoria_id', $id)->get();

        $otrascategorias = Categoria::where('id', '!=', $id)->get();

        $tipos = Tipo::get();
        return view('layouts.admin.productos.vertodos', compact('categoria', 'tipos', 'otrascategorias'));
    }

    public function productosListar()
    {
        // Traemos las categorías padre con sus productos y subcategorías recursivas
        $categorias = Categoria::with(['productos', 'categorias_hijosRecursive.productos'])
            ->whereNull('categoria_id')
            ->get();

        $tipos = Tipo::all();

        return view('layouts.admin.productos.listar', compact('categorias', 'tipos'));
    }

    /*public function categorias_hijosRecursive()
    {
        return $this->hasMany(Categoria::class, 'categoria_id')->with('categorias_hijosRecursive', 'productos');
    }*/

    public function registrarproducto(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:255|unique:productos,codigo',
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
            'file' => 'nullable|file|image|max:2048',
        ]);

        $save_url = null;

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            $paths = [
                'pc' => 'archivos/productos/pc/',
                'tablet' => 'archivos/productos/tablet/',
                'celular' => 'archivos/productos/celular/'
            ];

            $sizes = [
                'pc' => [800, 800],
                'tablet' => [500, 500],
                'celular' => [300, 300]
            ];

            foreach ($paths as $key => $path) {
                $fullPath = public_path($path);
                if (!file_exists($fullPath)) {
                    mkdir($fullPath, 0777, true); // crea la carpeta recursivamente con permisos
                }

                Image::make($image)
                    ->resize($sizes[$key][0], $sizes[$key][1], function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->save($fullPath . $name_gen);
            }

            // Guardamos la versión de PC como imagen principal
            $save_url = $paths['pc'] . $name_gen;
        }

        $producto = Producto::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen_principal' => $save_url,
            'precio' => $request->precio,
            'categoria_id' => $request->categoria_id,
        ]);

        if ($request->has('tipos')) {
            foreach ($request->tipos as $tipo_id) {
                ProductoTipo::firstOrCreate([
                    'producto_id' => $producto->id,
                    'tipo_id' => $tipo_id,
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Producto registrado exitosamente.',
            'producto' => $producto,
        ]);
    }

    public function actualizarproducto(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:productos,id',
            'codigo' => 'required|string|max:255|unique:productos,codigo,' . $request->id,
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen_principal' => 'nullable|image|mimes:jpeg,png,jpg,gif,ico|max:2048',
        ]);

        $producto = Producto::findOrFail($request->id);

        if ($request->hasFile('imagen_principal') && $request->file('imagen_principal')->isValid()) {
            $image = $request->file('imagen_principal');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            $paths = [
                'pc' => 'archivos/productos/pc/',
                'tablet' => 'archivos/productos/tablet/',
                'celular' => 'archivos/productos/celular/',
            ];

            $sizes = [
                'pc' => [800, 800],
                'tablet' => [500, 500],
                'celular' => [300, 300],
            ];

            foreach ($paths as $key => $path) {
                if (!file_exists(public_path($path))) mkdir(public_path($path), 0755, true);

                Image::make($image)
                    ->resize($sizes[$key][0], $sizes[$key][1])
                    ->save(public_path($path . $name_gen));
            }

            $producto->imagen_principal = $paths['pc'] . $name_gen;
        }

        // Actualizar el resto de campos
        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->categoria_id = $request->categoria_id;

        $producto->save();

        return response()->json([
            'success' => true,
            'message' => 'Producto actualizado correctamente.',
            'producto' => $producto,
        ]);
    }

    public function articulosver()
    {
        return view('layouts.admin.articulos.ver');
    }

    public function categoriaseditar(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:categorias,id',
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|in:asignado,no asignado',
            'descripcion' => 'required|string|max:1000',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,ico|max:2048',
        ]);

        $categoria = Categoria::findOrFail($request->id);

        // Actualizamos los datos principales
        $categoria->update([
            'nombre' => $validated['nombre'],
            'tipo' => $validated['tipo'],
            'descripcion' => $validated['descripcion'],
            'categoria_id' => $validated['categoria_id'] ?? null,
        ]);

        if ($request->hasFile('imagen')) {
            // Borrar imágenes antiguas si existen
            $oldImagePath = $categoria->imagen;
            if ($oldImagePath) {
                foreach (['pc', 'tablet', 'celular'] as $device) {
                    $oldDeviceImagePath = str_replace('pc', $device, $oldImagePath);
                    if (Storage::exists($oldDeviceImagePath)) {
                        Storage::delete($oldDeviceImagePath);
                    }
                }
            }

            $image = $request->file('imagen');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            $paths = [
                'pc' => 'archivos/categorias/pc/',
                'tablet' => 'archivos/categorias/tablet/',
                'celular' => 'archivos/categorias/celular/'
            ];

            $sizes = [
                'pc' => [800, 800],
                'tablet' => [500, 500],
                'celular' => [300, 300]
            ];

            foreach ($paths as $path) {
                Storage::makeDirectory($path);
            }

            foreach ($sizes as $device => $size) {
                Image::make($image)
                    ->resize($size[0], $size[1])
                    ->save($paths[$device] . $name_gen);
            }

            $save_url = 'archivos/categorias/pc/' . $name_gen;
            $categoria->update(['imagen' => $save_url]);
        }

        return back()->with('success', 'Categoría actualizada exitosamente.');
    }

    public function registrarpr(Request $request)
    {
        $request->validate([
            'codigo'       => 'nullable|string|max:255|unique:productos,codigo',
            'nombre'       => 'required|string|max:255',
            'precio'       => 'required|numeric|min:0',
            'descripcion'  => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
            'file'         => 'nullable|file|image|max:2048',
            'tipos'        => 'nullable|array',
            'tipos.*'      => 'exists:tipos,id'
        ]);

        $save_url = null;
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $path = 'archivos/productos/';
            if (!file_exists(public_path($path))) mkdir(public_path($path), 0777, true);
            $image->move(public_path($path), $name_gen);
            $save_url = $path . $name_gen;
        }

        $producto = Producto::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'imagen_principal' => $save_url,
            'categoria_id' => $request->categoria_id,
        ]);

        if ($request->tipos) {
            foreach ($request->tipos as $tipo_id) {
                ProductoTipo::create([
                    'producto_id' => $producto->id,
                    'tipo_id' => $tipo_id
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Producto registrado exitosamente.',
            'producto' => $producto
        ]);
    }
}
