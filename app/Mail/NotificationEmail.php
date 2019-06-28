<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $inputs;
    /**
     * Construtor.
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
        return $this->view('email.content')->with([
            'titulo' => $this->inputs['titulo'],
            'autor' => $this->inputs['autor'],
            'hora' => $this->inputs['horario'],
            'data' => $this->inputs['data'],
        ]);
    }
}
