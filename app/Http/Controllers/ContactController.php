<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessageMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function store(ContactRequest $request): RedirectResponse
    {
        $data = $request->contactPayload();

        try {
            Mail::to(config('contact.to'))->send(new ContactMessageMail($data));
        } catch (Throwable $e) {
            report($e);

            return redirect()->back()
                ->withInput()
                ->with('error', 'We could not send your message right now. Please try again in a few minutes or call the church office.');
        }

        return redirect()->back()->with('success', 'Thank you — we received your message and will be in touch soon.');
    }
}
