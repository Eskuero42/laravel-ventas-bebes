<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulos';

    protected $fillable = [
        'codigo',
        'nombre',
        'precio',
        'stock',
        'descuento',
        'descuento_habilitado',
        'descuento_porcentaje',
        'estado',
        'fecha_vencimiento',
        'producto_id',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    // Relación con catálogo si los estás usando
    public function catalogos()
    {
        return $this->hasMany(Catalogo::class, 'articulo_id');
    }

    public function posiciones()
    {
        return $this->hasMany(Posicion::class, 'articulo_id');
    }
    
    public function detalles()
    {
        return $this->hasMany(Detalle::class);
    }

    public function tipos()
    {
        return $this->belongsToMany(Tipo::class, 'articulo_tipo', 'articulo_id', 'tipo_id')
            ->withPivot('producto_tipo_id');
    }

    public function compras_articulos()
    {
        return $this->hasMany(Compra_Articulo::class, 'articulo_id');
    }
}
