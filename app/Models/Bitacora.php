<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;

    protected $table = 'bitacoras';

    protected $primaryKey = 'id';

    protected $fillable = [
        'ID_Usuario',
        'entrada',
        'salida',
        'usuario',
        'tipo',
        'direccionIp',
        'navegador',
    ];

    public function detallebitacoras()
    {
        return $this->hasMany(DetalleBitacora::class, 'ID_Bitacora');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'ID_Usuario');
    }
}
