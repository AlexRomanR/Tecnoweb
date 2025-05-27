<?php

namespace App\MailCommands;

use App\Services\SocketMailService;
use Illuminate\Support\Facades\DB;

class MailCommandHandler
{
    public static function procesar($mail)
    {
        $subject = strtoupper(trim($mail['subject']));
        $from = $mail['from'];
        $to = $mail['to'];

        if (str_starts_with($subject, 'AYUDA[')) {
            $respuesta = "Comandos disponibles:\n- AYUDA[]\n- LISPER[]\n- INSPER[]";
            return self::responder($to, $from, 'Ayuda del sistema', $respuesta);
        }

        if (str_starts_with($subject, 'LISPER[')) {
            //$datos = DB::table('Personal')->select('nombre', 'cargo')->get();
            $respuesta = "Lista de Personal:\n";
            //foreach ($datos as $p) {
            //    $respuesta .= "- {$p->nombre}, {$p->cargo}\n";
            //}
            return self::responder($to, $from, 'Personal de la empresa', $respuesta);
        }

        if (str_starts_with($subject, 'INSPER[')) {
            //$datos = DB::table('Personal')->where('cargo', 'Inspector')->get();
            $respuesta = "Inspectores:\n";
            //foreach ($datos as $p) {
            //    $respuesta .= "- {$p->nombre}\n";
            //}
            return self::responder($to, $from, 'Inspectores', $respuesta);
        }

        return self::responder($to, $from, 'Comando no reconocido', 'El comando ingresado no es válido.');
    }

    private static function responder($from, $to, $subject, $body)
    {
        SocketMailService::enviar([
            'from' => $from,
            'to' => $to,
            'subject' => $subject,
            'body' => $body
        ]);
    }
}
