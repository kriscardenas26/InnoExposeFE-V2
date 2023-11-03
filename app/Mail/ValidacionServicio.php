<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ValidacionServicio extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $newLink;
    public $messages;
    public $nombreServicio; // Agregamos esta variable

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $messages, $newLink, $nombreServicio)
    {
        $this->email = $email;
        $this->newLink = $newLink;
        $this->messages = $messages;
        $this->nombreServicio = $nombreServicio; // Incluimos el nombre del servicio
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.AvisoServicio', [
            'email' => $this->email,
            'newLink' => $this->newLink,
            'messages' => $this->messages,
            'nombreServicio' => $this->nombreServicio, // Pasamos el nombre del servicio a la vista
        ])->to($this->email);
    }
}
