<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'fecha_compra',
        'precio_total',
        'descuento',
        'cantidad',
        'pago_total'
    ];

    public function compras_articulos()
    {
        return $this->hasMany(Compra_Articulo::class, 'compra_id');
    }
}
