<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class RejectRegistrationController extends Controller
{
    public function __invoke(User $user): View
    {
        if ($user->is_admin) {
            abort(403);
        }

        if ($user->approved_at !== null) {
            return view('auth.registration-action-result', [
                'title' => 'Cannot decline',
                'message' => 'This account was already approved. Decline only applies to pending registrations.',
                'loginUrl' => route('login'),
            ]);
        }

        $user->delete();

        return view('auth.registration-action-result', [
            'title' => 'Registration declined',
            'message' => 'The pending account has been removed.',
            'loginUrl' => route('login'),
        ]);
    }
}
