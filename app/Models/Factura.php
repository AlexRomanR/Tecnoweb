<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'factura';
    protected $primaryKey = 'id';

    protected $fillable = [
        'ID_Usuario',
        'monto'
    ];


    public function usuario()
    {
        return $this->belongsTo(User::class, 'ID_Usuario');
    }
}
