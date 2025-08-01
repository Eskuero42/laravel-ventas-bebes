<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Slider;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal()
    {
        try {
            $categorias = Categoria::whereNull('categoria_id')->get();
            /*$categorias = Categoria::with('categorias_hijos.categorias_hijos')
            ->whereNull('categoria_id')
            ->get();*/
            //\Log::info($categorias);

            //$sliders = Slider::all();
            $sliders = Slider::where('estado', 'activo')->get();
            $iconos = Slider::where('tipo', 'icono')->get();

            //Obtener **solo 4** productos aleatorios
            $productos = Producto::inRandomOrder()
                ->take(4)
                ->get();

            return view('layouts.users.principal', compact('categorias', 'sliders', 'iconos','productos'));
        } catch (\Exception $e) {
            return abort(404, "Algo salió mal!");
        }
    }

    public function login()
    {
        try {

            return view('layouts.users.login.login');
        } catch (\Exception $e) {
            return abort(404, "Algo salio mal!");
        }
    }

    public function index()
    {
        try {

            return view('layouts.admin.dashboard');
        } catch (\Exception $e) {
            return abort(404, "Algo salio mal!");
        }
    }

    public function productos()
    {
        try {

            return view('layouts.users.productos');
        } catch (\Exception $e) {
            return abort(404, "Algo salio mal!");
        }
    }
}
