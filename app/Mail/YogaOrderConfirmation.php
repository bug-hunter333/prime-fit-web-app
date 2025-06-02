<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class YogaOrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $orderData;
    public $cart;
    public $total;

    public function __construct($orderData, $cart, $total)
    {
        $this->orderData = $orderData;
        $this->cart = $cart;
        $this->total = $total;
    }

    public function build()
    {
        return $this->subject('Yoga Order Confirmation - Thank You!')
                    ->view('emails.yoga-order-confirmation');
    }
}