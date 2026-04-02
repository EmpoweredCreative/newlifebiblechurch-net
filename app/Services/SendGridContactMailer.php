<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;

class SendGridContactMailer
{
    /**
     * @param  array{first_name: string, last_name: string, email: string, phone?: string|null, message: string}  $data
     */
    public function send(array $data): void
    {
        $apiKey = config('services.sendgrid.api_key');
        if (! is_string($apiKey) || $apiKey === '') {
            throw new \RuntimeException('SendGrid API key is not configured.');
        }

        $to = config('mail.contact_to');
        $fromAddress = config('mail.from.address');
        $fromName = config('mail.from.name');

        $body = View::make('emails.contact-text', ['data' => $data])->render();

        $response = Http::withToken($apiKey)
            ->acceptJson()
            ->post('https://api.sendgrid.com/v3/mail/send', [
                'personalizations' => [[
                    'to' => [['email' => $to]],
                    'subject' => 'Website contact: '.$data['first_name'].' '.$data['last_name'],
                ]],
                'from' => [
                    'email' => $fromAddress,
                    'name' => $fromName,
                ],
                'reply_to' => [
                    'email' => $data['email'],
                    'name' => $data['first_name'].' '.$data['last_name'],
                ],
                'content' => [[
                    'type' => 'text/plain',
                    'value' => $body,
                ]],
            ]);

        $response->throw();
    }
}
