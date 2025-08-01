<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    use HasFactory;

    protected $table = 'caracteristicas';

    protected $fillable = [
        'descripcion',
        'icono',
        'producto_id'
    ];

    //relaciones
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
