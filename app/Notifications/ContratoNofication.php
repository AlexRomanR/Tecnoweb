<?php

namespace App\Notifications;

use App\Models\Pre_Contrato;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContratoNofication extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $contrato;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Pre_Contrato $contrato)
    {
        $this->contrato = $contrato;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
            ->subject('Confirmación de Selección para contrato')
            ->markdown('correos.contrato', ['contrato' => $this->contrato, 'notifiable' => $notifiable]);
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'titulo' => "Felicidades!",
            'contenido' => "Has sido seleccionado para el puesto al que postulaste. Revisa los detalles del precontrato",
            'link' => route('generarContratoPDF', $this->contrato->ID_Postulante),
            'type' => 'contrato',
        ];
    }
}
