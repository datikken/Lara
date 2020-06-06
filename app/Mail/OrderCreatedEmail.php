<?php

namespace App\Mail;

use App\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCreatedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $cart;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Cart $cart)
    {
        $this->order = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build($subject = 'Интернет магазин')
    {
        return $this->from('tikken23@deonis39.ru')->subject($subject)->view('emails.order_created')->with('data', $this->data);
    }
}
