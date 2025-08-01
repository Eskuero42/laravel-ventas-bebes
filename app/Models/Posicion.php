<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posicion extends Model
{
    use HasFactory;

    protected $table = 'posiciones';

    protected $fillable = [
        'imagen',
        'articulo_id'
    ];

    //relaciones
    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'articulo_id');
    }
}
