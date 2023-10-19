<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificacionUsuarios extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $newLink;
    public $messages;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$messages,$newLink)
    {
        $this->email = $email;
        $this->newLink = $newLink;
        $this->messages = $messages;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.register-aviso', [
            'email' => $this->email,
            'newLink' => $this->newLink,
            'messages' => $this->messages,
        ])->to($this->email);
    }
}
