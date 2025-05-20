<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleBitacora extends Model
{
    use HasFactory;

    protected $table = 'detalle_bitacoras';

    protected $fillable = [
        'ID_Bitacora',
        'accion',
        'metodo',
        'hora',
        'tabla',
        'registroId',
        'ruta',
    ];

    public function bitacora()
    {
        return $this->belongsTo(Bitacora::class, 'ID_Bitacora');
    }
}
