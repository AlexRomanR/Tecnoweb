<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\User;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function inicio($id)
    {
        $usuario = User::where('id', '=', $id)->first();
        $bitacoras = Bitacora::where('ID_Usuario', '=', $id)->get();
        return view('1_Usuarios.bitacoras.inicio', compact('bitacoras', 'usuario'));
    }

    public function rinicio()
    {
        $bitacoras = Bitacora::all();
        return view('1_Usuarios.bitacoras.rinicio', compact('bitacoras'));
    }

    // public function generarBitacoraPDF(){
    //     $bitacoras = Bitacora::all();
    //     $data = [
    //         'bitacoras' => $bitacoras,
    //     ];

    //     $pdf = Pdf::loadView('PDF.bitacoras-usuarios', $data);


    //     return $pdf->stream('Bitacoras-Usuarios.pdf');
    // }

    // public function generarBitacoraPDF_usuario($id){
    //     $usuario = User::where('id', '=', $id)->first();
    //     $bitacoras = Bitacora::where('ID_Usuario', '=', $id)->get();
    //     $data = [
    //         'usuario' => $usuario,
    //         'bitacoras' => $bitacoras,
    //     ];

    //     $pdf = Pdf::loadView('PDF.bitacoras-usuario', $data);


    //     return $pdf->stream('Bitacoras-Usuario.pdf');
    // }
}
