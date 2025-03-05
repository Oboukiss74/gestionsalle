<?php

namespace App\Mail;

use App\Models\Demandes;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class DemandeValidationAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $demande;

    /**
     * Create a new message instance.
     */
    public function __construct(Demandes $demande)
    {
        $this->demande = $demande;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Nouvelle demande de location')
                    ->view('emails.validation_demande');
    }

    
}


