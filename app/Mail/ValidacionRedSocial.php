<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ValidacionRedSocial extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $newLink;
    public $messages;
    public $nombreRS;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$messages,$newLink,$nombreRS)
    {
        $this->email = $email;
        $this->newLink = $newLink;
        $this->messages = $messages;
        $this->nombreRS = $nombreRS;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.AvisoRedSocial', [
            'email' => $this->email,
            'newLink' => $this->newLink,
            'messages' => $this->messages,
            'fileName' => $this->nombreRS, 
        ])->to($this->email);
    }
}
