<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ValidacionImagen extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $newLink;
    public $messages;
    public $fileName;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$messages,$newLink,$fileName)
    {
        $this->email = $email;
        $this->newLink = $newLink;
        $this->messages = $messages;
        $this->fileName = $fileName;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.AvisoImagen', [
            'email' => $this->email,
            'newLink' => $this->newLink,
            'messages' => $this->messages,
            'fileName' => $this->fileName,
        ])->to($this->email);
    }
}
