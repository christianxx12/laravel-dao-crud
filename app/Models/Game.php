<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    // Aquí debes agregar los campos que se pueden llenar mediante mass assignment
    protected $fillable = [
        'nombre',
        'genero',
        'plataforma',
        'anio_lanzamiento',
        'pelicula',
        'empresa',
    ];
}