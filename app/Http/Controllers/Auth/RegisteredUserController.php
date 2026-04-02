<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Mail\PendingRegistrationMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    public function store(RegisterUserRequest $request): RedirectResponse
    {
        $user = User::create([
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'password' => Hash::make($request->validated('password')),
            'approved_at' => null,
            'email_verified_at' => now(),
        ]);

        $ttl = (int) config('registration.approve_link_ttl_minutes', 20_160);
        $expires = now()->addMinutes($ttl);

        $approveUrl = URL::temporarySignedRoute('registration.approve', $expires, ['user' => $user]);
        $rejectUrl = URL::temporarySignedRoute('registration.reject', $expires, ['user' => $user]);

        $approverEmail = (string) config('registration.approver_email');

        try {
            Mail::to($approverEmail)->send(new PendingRegistrationMail($user, $approveUrl, $rejectUrl));
        } catch (Throwable $e) {
            report($e);
            $user->delete();

            return redirect()->back()
                ->withInput($request->except('password', 'password_confirmation', 'website'))
                ->with('error', 'We could not complete registration right now. Please try again in a few minutes or contact the church office.');
        }

        return redirect()->route('login')->with(
            'status',
            'Thanks for registering. Your account is pending approval. You will receive an email when you can sign in.',
        );
    }
}
