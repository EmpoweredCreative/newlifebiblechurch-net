<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessageMail;
use App\Services\SendGridContactMailer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function store(ContactRequest $request): RedirectResponse
    {
        $data = $request->contactPayload();

        if (filled(config('services.sendgrid.api_key'))) {
            try {
                app(SendGridContactMailer::class)->send($data);
            } catch (Throwable $e) {
                report($e);

                return redirect()->back()
                    ->withInput()
                    ->with('error', 'We could not send your message right now. Please try again in a few minutes or call the church office.');
            }
        } else {
            Mail::to(config('mail.contact_to'))->send(new ContactMessageMail($data));
        }

        return redirect()->back()->with('success', 'Thank you — we received your message and will be in touch soon.');
    }
}
