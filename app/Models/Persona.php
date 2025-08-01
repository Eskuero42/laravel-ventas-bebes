<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';
    protected $fillable = [
        'carnet',
        'nombres',
        'apellidos',
        'correo',
        'celular',
        'direccion',
        'estado',
        'ciudad_id'
    ];

    // Relaciones
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id');            

    }
}
