<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Tipo;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoriasController extends Controller
{
    public function categoriaslistar()
    {
        $categorias = Categoria::whereNull('categoria_id')->get();
        /*$categorias = Categoria::with('categorias_hijos.categorias_hijos')
            ->whereNull('categoria_id')
            ->get();*/
        //\Log::info($categorias);

        return view('layouts.admin.categorias.listar', compact('categorias'));
    }

    public function categoriasregistrar(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|in:asignado,no asignado',
            'descripcion' => 'required|string|max:1000',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,ico|max:2048',
            'categoria_id' => 'nullable|exists:categorias,id',
        ]);

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

        foreach ($sizes as $d => $size) {
            Image::make($image)
                ->resize($size[0], $size[1])
                ->save($paths[$d] . $name_gen);
        }

        $save_url = 'archivos/categorias/pc/' . $name_gen;

        $categoria = Categoria::create([
            'nombre' => $validated['nombre'],
            'tipo' => $validated['tipo'],
            'descripcion' => $validated['descripcion'],
            'imagen' => $save_url,
            'categoria_id' => $validated['categoria_id'] ?? null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Categoría registrada exitosamente.',
            'categoria' => $categoria
        ]);
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

        $categoria->update([
            'nombre' => $validated['nombre'],
            'tipo' => $validated['tipo'],
            'descripcion' => $validated['descripcion'],
            'categoria_id' => $validated['categoria_id'] ?? null,
        ]);


        if ($request->hasFile('imagen')) {
            // Eliminar las imágenes antiguas si es necesario
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

        return response()->json([
            'success' => true,
            'message' => 'Categoría actualizada exitosamente.',
            'categoria' => $categoria
        ]);
    }

    public function subcategoriasver()
    {
        return view('layouts.admin.categorias.subcategoriaver');
    }
}
