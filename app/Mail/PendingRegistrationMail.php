<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PendingRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public User $user,
        public string $approveUrl,
        public string $rejectUrl,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New account registration pending approval — '.$this->user->email,
            replyTo: [
                new Address($this->user->email, $this->user->name),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            text: 'emails.pending-registration-text',
        );
    }
}
