<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

// Créer d'abord la classe Mailable dans app/Mail/ResetPasswordMail.php
class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $email;

    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    public function build()
    {
        return $this->from('christakadje20@gmail.com')
                    ->subject('Réinitialisation de mot de passe')
                    ->view('emails.reset-password', [
                        'token' => $this->token,
                        'email' => $this->email
                    ]);
    }
}
