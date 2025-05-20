<?php

namespace App\Notifications;

use App\Models\Permiso;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Ramsey\Uuid\Type\Integer;

class PermisosNotification extends Notification
{
    use Queueable;

    public $permiso;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Permiso $permiso)
    {
        $this->permiso = $permiso;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $user = User::find($this->permiso->user_id);
        return [
            'titulo' => "Nueva Solicitud de Permiso",
            'contenido' => "El usuario {$user->name} ha solicitado un nuevo permiso. Desde: {$this->permiso->fecha_inicio} Hasta: {$this->permiso->fecha_fin}",
            'link' => route('permisos.historial'),
            'type' => 'permisonuevo',
        ];
    }
}