<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;

    protected $table = 'detalles';

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'producto_id'
    ];

    //relaciones
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class);
    }
}
