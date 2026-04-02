<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RegistrationApprovedMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ApproveRegistrationController extends Controller
{
    public function __invoke(User $user): View
    {
        if ($user->is_admin) {
            abort(403);
        }

        if ($user->approved_at !== null) {
            return view('auth.registration-action-result', [
                'title' => 'Already approved',
                'message' => 'This account was already approved. No changes were made.',
                'loginUrl' => route('login'),
            ]);
        }

        $user->forceFill(['approved_at' => now()])->save();

        $loginUrl = route('login');
        Mail::to($user->email)->send(new RegistrationApprovedMail($loginUrl));

        return view('auth.registration-action-result', [
            'title' => 'Registration approved',
            'message' => 'The account has been approved. The registrant has been emailed with a link to sign in.',
            'loginUrl' => $loginUrl,
        ]);
    }
}
