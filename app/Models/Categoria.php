<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
        'tipo',
        'categoria_id'
    ];

    //relaciones
    public function categorias_hijos()
    {
        return $this->hasMany(Categoria::class, 'categoria_id');
    }

    public function categoria_padre()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }

    public function categorias_hijosRecursive()
    {
        return $this->hasMany(Categoria::class, 'categoria_id')->with('categorias_hijosRecursive', 'productos');
    }

    public function categoriasHijosRecursivamente()
    {
        return $this->categorias_hijos()->with('categoriasHijosRecursivamente');
    }
}
