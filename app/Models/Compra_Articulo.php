<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra_Articulo extends Model
{
    use HasFactory;

    protected $table = 'compras_articulos';

    protected $fillable = [
        'compra_id',
        'articulo_id',
        'cantidad_comprada',
        'detalle_precio',
        'descuento',
    ];

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'compra_id');
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'articulo_id');
    }
}
