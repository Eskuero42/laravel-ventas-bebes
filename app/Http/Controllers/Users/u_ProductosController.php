<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Articulo;
use App\Models\Posicion;
use App\Models\Producto;
use Illuminate\Http\Request;

class u_ProductosController extends Controller
{
    public function u_productosver($id)
    {
        $producto = Producto::with('producto_tipos.tipo.especificaciones')->find($id);

        $posiciones = Posicion::with(['articulo'])
            ->whereHas('articulo', function ($query) use ($producto) {
                $query->where('producto_id', $producto->id);
            })
            ->get();
        $articulos = Articulo::get();

        return view('layouts.users.productos.ver', compact('producto', 'posiciones', 'articulos'));
    }
}
