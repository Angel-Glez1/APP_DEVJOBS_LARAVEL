<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vacante, $vacante_id)
    {
        $this->vacante = $vacante;
        $this->vacante_id = $vacante_id;
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
                    ->line('Has recibido un nuevo candidato en tu vacante')
                    ->line('la vacante es: '. $this->vacante)
                    ->action('Visita devJobs', url('/'))
                    ->line('Gracias por utilizar devJobs');
    }

    /**
     * Este metodo es que que ocupa laravel 
     * para guardar la notificacion en la base lo que se 
     * guarde pongas en el array en la que se va a guardar 
     * en la columna data en 
     */
    public function toDatabase($notifiable)
    {   

        return [
            'vacante' => $this->vacante,
            'vacante_id' =>  $this->vacante_id
        ];

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
            //
        ];
    }
}
