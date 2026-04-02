<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        public array $data,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Website contact: '.$this->data['first_name'].' '.$this->data['last_name'],
            replyTo: [
                new Address(
                    $this->data['email'],
                    $this->data['first_name'].' '.$this->data['last_name'],
                ),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            text: 'emails.contact-text',
        );
    }
}
