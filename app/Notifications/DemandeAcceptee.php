<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;

class DemandeAcceptee extends Notification
{
    use Queueable;

    /**
     * The demande instance.
     *
     * @var mixed
     */
    protected $demande;

    /**
     * Create a new notification instance.
     */
    public function __construct($demande)
    {
        $this->demande = $demande;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        return (new MailMessage)
                    ->subject('Demande acceptée')
                    ->greeting('Bonjour ' . $notifiable->nom_complet)
                    ->line('votre demande soumise le '.$this->demande->created_at->format('d/m/Y'). 'pour ' .$this->demande->motif. 'qui doit debuter du ' .Carbon::parse( $this->demande->datedebut)->format('d/m/Y').
                    ' au ' .Carbon::parse($this->demande->datefin )->format('d/m/Y'). ' a été acceptée.')
                    ->line('merci de proceder au payement  et recuperer votre reçu
                    avant les 24h de la date de l\'événement.')
                    ->action('Voir ma demande', url('/verifier/demande_acceptee/' . $this->demande->id));
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

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Votre demande a été acceptée.',
            'demande_id' => $this->demande->id,
        ];
    }
}
