<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmacionCompra extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pedido)
    {
        $this->pedido = $pedido;
    }
    

    /**
     * Build the message.
     *
     * @return $this
     */
    protected $pedido;

public function build()
{
    return $this->view('emails.confirmacion_compra')
                ->with(['pedido' => $this->pedido]);
}

}
