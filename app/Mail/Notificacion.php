<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Trabajador;

class Notificacion extends Mailable
{
    use Queueable, SerializesModels;

    public $trabajador;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Trabajador $trabajador)
    {
        $this->trabajador = $trabajador;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Notificación de Contrato')
                    ->view('emails.notificacion');
    }
} 