<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class u_CategoriasController extends Controller
{
    public function u_categoriasListar($id)
    {
        try {
            // Buscar la categoría por ID
            $categoria = Categoria::findOrFail($id);
            // Obtener [id => categoria_padre_id]
            $relacionesCategorias = Categoria::pluck('categoria_id', 'id');
            // Iniciar lista con la categoría seleccionada
            $idsCategoriasEncontradas = [$id];
            // Agregar hijos directos a la lista
            foreach ($relacionesCategorias as $idCategoriaHija => $idCategoriaPadre) {
                if (in_array($idCategoriaPadre, $idsCategoriasEncontradas)) {
                    $idsCategoriasEncontradas[] = $idCategoriaHija;
                }
            }
            // Buscar productos en las categorías encontradas
            $productos = Producto::whereIn('categoria_id', $idsCategoriasEncontradas)->get();
            // Mostrar vista con categoría y productos
            return view('layouts.users.categorias.listar', compact('categoria', 'productos'));
            
        } catch (\Exception $e) {
            // Error: mostrar 404
            abort(404, "Algo salió mal!");
        }
    }
}
