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
        /*$categorias = Categoria::with(['productos', 'categorias_hijosRecursive.productos'])
            ->whereNull('categoria_id')
            ->get();*/
        $categorias = Categoria::where('categoria_id', '=', 'null')->get();

        $tipos = Tipo::get();

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

        foreach ($paths as $path) {
            Storage::makeDirectory($path);
        }

        foreach ($sizes as $d => $size) {
            Image::make($image)
                ->resize($size[0], $size[1])
                ->save($paths[$d] . $name_gen);
        }

        $save_url = 'archivos/productos/pc/' . $name_gen;

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
        $rules = [
            'id' => 'required|exists:productos,id',
            'codigo' => 'required|string|max:255|unique:productos,codigo,' . $request->id,
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
        ];

        // ✅ Solo si viene una imagen nueva, se valida
        if ($request->hasFile('imagen_principal')) {
            $rules['imagen_principal'] = 'image|mimes:jpeg,png,jpg,gif,ico|max:2048';
        }

        $request->validate($rules);

        $producto = Producto::findOrFail($request->id);

        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('productos', 'public');
            $producto->imagen = $imagePath;
        }

        $producto = Producto::findOrFail($request->id);

        // Solo guardar nueva imagen si se subió
        if ($request->hasFile('imagen_principal')) {
            $imagePath = $request->file('imagen_principal')->store('productos', 'public');
            $producto->imagen_principal = $imagePath;
        }

        // Actualizar otros campos
        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->categoria_id = $request->categoria_id;

        $producto->save();

        return response()->json([
            'success' => true,
            'message' => 'Producto actualizado correctamente.',
            'producto' => $producto
        ]);
    }

    public function articulosver()
    {
        return view('layouts.admin.articulos.ver');
    }
}
