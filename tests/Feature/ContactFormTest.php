<?php

namespace Tests\Feature;

use App\Mail\ContactMessageMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    private function validPayload(array $overrides = []): array
    {
        return array_merge([
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'phone' => '555-0100',
            'email' => 'jane@example.com',
            'message' => 'Hello from the test message.',
            'company' => '',
            'form_started_at' => (int) round(microtime(true) * 1000) - 15_000,
        ], $overrides);
    }

    public function test_contact_submission_sends_mailable(): void
    {
        Mail::fake();

        $response = $this->from(route('connect'))
            ->post(route('contact.store'), $this->validPayload());

        $response->assertRedirect();
        $response->assertSessionHas('success');
        Mail::assertSent(ContactMessageMail::class);
    }

    public function test_contact_submission_sends_mailable_when_sendgrid_key_is_set(): void
    {
        Mail::fake();
        config([
            'services.sendgrid.api_key' => 'sg.test-key',
            'contact.to' => 'inbox@example.org',
            'mail.from.address' => 'noreply@example.org',
            'mail.from.name' => 'Test Site',
        ]);

        $response = $this->from(route('connect'))
            ->post(route('contact.store'), $this->validPayload([
                'phone' => '',
                'message' => 'Hello via SendGrid SMTP mailer.',
            ]));

        $response->assertRedirect();
        $response->assertSessionHas('success');

        Mail::assertSent(ContactMessageMail::class, function (ContactMessageMail $mail): bool {
            return $mail->hasTo('inbox@example.org');
        });
    }

    public function test_contact_rejects_honeypot_when_filled(): void
    {
        Mail::fake();

        $response = $this->from(route('connect'))
            ->post(route('contact.store'), $this->validPayload([
                'company' => 'https://spam.example',
            ]));

        $response->assertSessionHasErrors('company');
        Mail::assertNothingSent();
    }

    public function test_contact_rejects_immediate_submission_without_waiting(): void
    {
        Mail::fake();

        $response = $this->from(route('connect'))
            ->post(route('contact.store'), $this->validPayload([
                'form_started_at' => (int) round(microtime(true) * 1000),
            ]));

        $response->assertSessionHasErrors('form_started_at');
        Mail::assertNothingSent();
    }

    public function test_contact_rejects_message_with_too_many_urls(): void
    {
        Mail::fake();
        config(['contact.max_urls_in_message' => 2]);

        $response = $this->from(route('connect'))
            ->post(route('contact.store'), $this->validPayload([
                'message' => 'See https://a.com and https://b.com and https://c.com for more.',
            ]));

        $response->assertSessionHasErrors('message');
        Mail::assertNothingSent();
    }

    public function test_contact_is_rate_limited(): void
    {
        Mail::fake();

        for ($i = 0; $i < 8; $i++) {
            $this->from(route('connect'))
                ->post(route('contact.store'), $this->validPayload([
                    'email' => "user{$i}@example.com",
                ]))
                ->assertRedirect()
                ->assertSessionHas('success');
        }

        $this->from(route('connect'))
            ->post(route('contact.store'), $this->validPayload([
                'email' => 'ninth@example.com',
            ]))
            ->assertStatus(429);
    }
}
