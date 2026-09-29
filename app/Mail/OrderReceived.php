<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Order $order)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Pesanan baru {$this->order->code} - {$this->order->product_name}",
            replyTo: [new Address($this->order->customer_email, $this->order->customer_name)],
        );
    }

    public function content(): Content
    {
        return new Content(text: 'emails.pesanan-baru');
    }
}
