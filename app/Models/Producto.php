<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'imagen_principal',
        'precio',
        'categoria_id'
    ];

    //relaciones
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function detalles()
    {
        return $this->hasMany(Detalle::class, 'producto_id');
    }

    public function caracteristicas()
    {
        return $this->hasMany(Caracteristica::class, 'producto_id');
    }

    public function producto_tipos()
    {
        return $this->hasMany(ProductoTipo::class, 'producto_id');
    }

    public function articulos()
    {
        return $this->hasMany(Articulo::class, 'producto_id');
    }
}
