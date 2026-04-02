<?php

namespace Tests\Feature\Auth;

use App\Mail\PendingRegistrationMail;
use App\Mail\RegistrationApprovedMail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    private function validRegistrationPayload(): array
    {
        return [
            'name' => 'Jane Member',
            'email' => 'jane@example.com',
            'password' => 'Str0ng!password',
            'password_confirmation' => 'Str0ng!password',
            'website' => '',
            'form_started_at' => (int) round(microtime(true) * 1000) - 15_000,
        ];
    }

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_registration_is_pending_and_notifies_approver(): void
    {
        Mail::fake();

        $response = $this->post('/register', $this->validRegistrationPayload());

        $response->assertRedirect(route('login', absolute: false));
        $response->assertSessionHas('status');

        $this->assertDatabaseHas('users', [
            'email' => 'jane@example.com',
            'approved_at' => null,
        ]);

        Mail::assertSent(PendingRegistrationMail::class, function (PendingRegistrationMail $mail): bool {
            return $mail->hasTo(config('registration.approver_email'))
                && $mail->user->email === 'jane@example.com';
        });
    }

    public function test_registration_rejects_honeypot_field(): void
    {
        Mail::fake();

        $payload = $this->validRegistrationPayload();
        $payload['website'] = 'https://spam.test';

        $response = $this->post('/register', $payload);

        $response->assertSessionHasErrors('website');
        $this->assertDatabaseMissing('users', ['email' => 'jane@example.com']);
        Mail::assertNothingSent();
    }

    public function test_registration_rejects_immediate_submit(): void
    {
        Mail::fake();

        $payload = $this->validRegistrationPayload();
        $payload['form_started_at'] = (int) round(microtime(true) * 1000);

        $response = $this->post('/register', $payload);

        $response->assertSessionHasErrors('form_started_at');
        $this->assertDatabaseMissing('users', ['email' => 'jane@example.com']);
        Mail::assertNothingSent();
    }

    public function test_pending_user_cannot_log_in(): void
    {
        $user = User::factory()->pendingApproval()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    public function test_approve_signed_link_approves_user_and_emails_them(): void
    {
        Mail::fake();

        $user = User::factory()->pendingApproval()->create([
            'email' => 'pending@example.com',
        ]);

        $url = URL::temporarySignedRoute(
            'registration.approve',
            now()->addHour(),
            ['user' => $user],
        );

        $response = $this->get($url);

        $response->assertOk();
        $response->assertSee('approved', false);

        $user->refresh();
        $this->assertNotNull($user->approved_at);

        Mail::assertSent(RegistrationApprovedMail::class, function (RegistrationApprovedMail $mail): bool {
            return $mail->hasTo('pending@example.com');
        });
    }

    public function test_reject_signed_link_deletes_pending_user(): void
    {
        Mail::fake();

        $user = User::factory()->pendingApproval()->create();

        $url = URL::temporarySignedRoute(
            'registration.reject',
            now()->addHour(),
            ['user' => $user],
        );

        $response = $this->get($url);

        $response->assertOk();
        $response->assertSee('declined', false);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_approve_without_valid_signature_returns_403(): void
    {
        $user = User::factory()->pendingApproval()->create();

        $response = $this->get(route('registration.approve', ['user' => $user]));

        $response->assertForbidden();
    }
}
