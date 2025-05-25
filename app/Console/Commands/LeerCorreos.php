<?php

namespace App\Console\Commands;

use App\MailCommands\MailCommandHandler;
use Illuminate\Console\Command;
use Webklex\IMAP\Facades\Client;

class LeerCorreos extends Command
{
    protected $signature = 'correos:leer';
    protected $description = 'Leer correos nuevos usando Webklex PHP-IMAP por POP3';

    public function handle()
    {
        $this->info('Conectando al servidor POP3...');

        try {
            $client = Client::account('pop3');
            $client->connect();

            $folder = $client->getFolder('INBOX');

            $ultimoUIDProcesado = $this->obtenerUltimoUIDProcesado() ?? 0;
            $messageCount = $folder->messages()->count();

            $this->info("Todos los mensajes: " . $messageCount);

            if ($messageCount === 0) {
                $this->info("No hay mensajes.");
                $client->disconnect();
                return;
            }

            if ($ultimoUIDProcesado == $messageCount) {
                $this->info("No hay mensajes nuevos.");
                $client->disconnect();
                return;
            }

            $mensajesNoLeidos = $messageCount - $ultimoUIDProcesado;

            $messages = $folder->query()
                               ->all() 
                               ->limit($mensajesNoLeidos, $messageCount) 
                               ->get();

            $this->info("Último UID procesado: " . $ultimoUIDProcesado);

            if ($messages->isEmpty()) {
                $this->info("No hay mensajes nuevos.");
                $client->disconnect();
                return;
            }

            $this->info("Mensajes nuevos encontrados: " . $messages->count());

            foreach ($messages as $message) {
                $this->line('──────────────────────────────');
                $this->info("Procesando Mensaje UID: " . $message->getUid());
                $this->line("De     : " . ($message->getFrom()[0]->mail ?? 'Desconocido'));
                $this->line("Asunto : " . $message->getSubject());

                $body = trim(strip_tags($message->getTextBody()));
                $this->line("Cuerpo :\n" . $body);

                $from = $message->getFrom()[0]->mail ?? null;
                $to = $message->getTo()[0]->mail ?? null;

                if (!$from || !$to) {
                    $this->warn("Correo sin remitente o destinatario. Saltando...");
                    continue;
                }

                $mail = [
                    'from' => $from,
                    'to' => $to,
                    'subject' => $message->getSubject(),
                    'body' => $body,
                ];

                MailCommandHandler::procesar($mail);

                // Guardar el último UID procesado
                $this->guardarUltimoUIDProcesado($message->getUid());
            }

            $client->disconnect();
        } catch (\Exception $e) {
            $this->error('Error al conectar o leer correos: ' . $e->getMessage());
        }
    }

    private function obtenerUltimoUIDProcesado(): ?int
    {
        $path = storage_path('imap_last_uid.txt');
        return file_exists($path) ? (int) file_get_contents($path) : null;
    }

    private function guardarUltimoUIDProcesado(int $uid): void
    {
        file_put_contents(storage_path('imap_last_uid.txt'), $uid);
    }
}
