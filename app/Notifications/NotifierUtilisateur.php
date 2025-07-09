<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;

class NotifierUtilisateur extends Notification
{
    use Queueable;
    public $demande;

    /**
     * Create a new notification instance.
     */
    public function __construct($demande)
    {
        $this->demande = $demande;
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('demande refusée')
                    ->greeting('Bonjour ' . $notifiable->nom_complet)
                    ->line('Votre demande soumise le '.$this->demande->created_at->format('d/m/Y'). ' qui devait avoir lieu du '.Carbon::parse($this->demande->datedebut)->format('d/m/Y') .
                    ' au '.Carbon::parse($this->demande->datefin)->format('d/m/Y'). ' a été refusée.')
                    ->action('Voir ma demande', url('/demandes/verifie_demande'))
                    ->line('Merci d\'utiliser notre application !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
