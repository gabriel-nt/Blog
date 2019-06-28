<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $inputs;

    /**
     * Construtor
     *
     * @return void
     */
    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }

    /**
     * Criando a menssagem a ser enviada por email
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.contact')->with([
            'nome' => $this->inputs['nome'],
            'email' => $this->inputs['contato_email'],
            'mensagem' => $this->inputs['mensagem']
        ]);;
    }
}
