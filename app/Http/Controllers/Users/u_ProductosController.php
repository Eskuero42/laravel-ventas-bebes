<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class u_ProductosController extends Controller
{
     public function u_productosver($id)
    {
        $producto = Producto::findOrFail($id);
        return view('layouts.users.productos.ver', compact('producto'));
    }
}
