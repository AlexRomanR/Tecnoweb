<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Estudiante extends Model
{
    use HasFactory;

    protected $table = 'tipo_estudiante';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'status'
    ];

}
