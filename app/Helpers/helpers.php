<?php

use App\Models\Categoria;

function userObtenerCategorias()
{
    try {
        return Categoria::whereNull('categoria_id')->get();
    } catch (\Exception $e) {
        return abort(404, "Algo salió mal!");
    }
}
