<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class SocketMailService
{
    public static function enviar($data)
    {
        $servidor = "mail.tecnoweb.org.bo";
        $puerto = 25;
        $usuario = "grupo07sc";
        $password = "grup007grup007*";

        Log::info("Iniciando conexión SMTP con {$servidor}:{$puerto}");

        $fp = fsockopen($servidor, $puerto, $errno, $errstr, 30);
        if (!$fp) {
            Log::error("Error de conexión SMTP: $errstr ($errno)");
            return;
        }

        $leer = function () use ($fp) {
            $res = '';
            while ($line = fgets($fp, 515)) {
                $res .= $line;
                Log::info("SMTP << RAW: " . trim($line));
                if (preg_match('/^\d{3} /', $line)) break;
            }
            Log::info("SMTP << FINAL: " . trim($res));
            return $res;
        };


        $escribir = function ($cmd) use ($fp) {
            Log::info("SMTP >> " . $cmd);
            fputs($fp, $cmd . "\r\n");
        };

        // Comunicación con el servidor SMTP
        $leer(); // Saludo inicial
        $escribir("EHLO localhost");
        $leer();

        $escribir("AUTH LOGIN");
        $leer();
        $escribir(base64_encode($usuario));
        $leer();
        $escribir(base64_encode($password));
        $leer();

        $escribir("MAIL FROM:<{$data['from']}>");
        $leer();
        $escribir("RCPT TO:<{$data['to']}>");
        $leer();
        $escribir("DATA");
        $leer();

        $escribir("Subject: {$data['subject']}");
        $escribir("From: {$data['from']}");
        $escribir("To: {$data['to']}");
        $escribir("Content-Type: text/plain; charset=utf-8");
        $escribir("");
        $escribir($data['body']);
        $escribir(".");
        $leer();

        $escribir("QUIT");
        $leer();
        fclose($fp);

        Log::info("Correo enviado exitosamente a {$data['to']}");
    }
}
