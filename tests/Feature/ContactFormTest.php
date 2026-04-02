<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
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

    public function test_contact_submission_sends_mailable_when_sendgrid_is_not_configured(): void
    {
        config(['services.sendgrid.api_key' => null]);
        Mail::fake();

        $response = $this->from(route('connect'))
            ->post(route('contact.store'), $this->validPayload());

        $response->assertRedirect();
        $response->assertSessionHas('success');
        Mail::assertSent(\App\Mail\ContactMessageMail::class);
    }

    public function test_contact_submission_posts_to_sendgrid_when_api_key_is_set(): void
    {
        config([
            'services.sendgrid.api_key' => 'sg.test-key',
            'mail.contact_to' => 'inbox@example.org',
            'mail.from.address' => 'noreply@example.org',
            'mail.from.name' => 'Test Site',
        ]);

        Http::fake([
            'api.sendgrid.com/*' => Http::response('', 202),
        ]);

        $response = $this->from(route('connect'))
            ->post(route('contact.store'), $this->validPayload([
                'phone' => '',
                'message' => 'Hello via SendGrid API.',
            ]));

        $response->assertRedirect();
        $response->assertSessionHas('success');

        Http::assertSent(function (\Illuminate\Http\Client\Request $request): bool {
            return $request->url() === 'https://api.sendgrid.com/v3/mail/send'
                && $request->hasHeader('Authorization', 'Bearer sg.test-key')
                && str_contains($request->body(), 'inbox@example.org')
                && str_contains($request->body(), 'jane@example.com');
        });
    }

    public function test_contact_submission_shows_error_when_sendgrid_request_fails(): void
    {
        config([
            'services.sendgrid.api_key' => 'sg.bad',
            'mail.contact_to' => 'inbox@example.org',
            'mail.from.address' => 'noreply@example.org',
            'mail.from.name' => 'Test Site',
        ]);

        Http::fake([
            'api.sendgrid.com/*' => Http::response(['errors' => [['message' => 'Bad']]], 401),
        ]);

        $response = $this->from(route('connect'))
            ->post(route('contact.store'), $this->validPayload([
                'message' => 'Hello, this is long enough.',
            ]));

        $response->assertRedirect();
        $response->assertSessionHas('error');
        $response->assertSessionHasInput('email', 'jane@example.com');
    }

    public function test_contact_rejects_honeypot_when_filled(): void
    {
        config(['services.sendgrid.api_key' => null]);
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
        config(['services.sendgrid.api_key' => null]);
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
        config(['services.sendgrid.api_key' => null, 'contact.max_urls_in_message' => 2]);
        Mail::fake();

        $response = $this->from(route('connect'))
            ->post(route('contact.store'), $this->validPayload([
                'message' => 'See https://a.com and https://b.com and https://c.com for more.',
            ]));

        $response->assertSessionHasErrors('message');
        Mail::assertNothingSent();
    }

    public function test_contact_is_rate_limited(): void
    {
        config(['services.sendgrid.api_key' => null]);
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
