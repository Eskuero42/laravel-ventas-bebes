<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $table = 'tipos';

    protected $fillable = [
        'nombre',
    ];

    //relaciones
    public function especificaciones()
    {
        return $this->hasMany(Especificacion::class, 'tipo_id');
    }

    public function producto_tipos()
    {
        return $this->hasMany(ProductoTipo::class, 'tipo_id');
    }

    public function articulos()
    {
        return $this->hasMany(Articulo::class, 'tipo_id');
    }
}
