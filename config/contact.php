<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Contact form — where submissions are delivered
    |--------------------------------------------------------------------------
    |
    | Separate from registration approval (see config/registration.php).
    | CONTACT_FORM_TO is preferred; MAIL_CONTACT_TO and SENDGRID_TO_EMAIL are fallbacks (same env as
    | config('services.sendgrid.to_email')). Optional recipient display name: SENDGRID_TO_NAME.
    |
    */

    'to' => filled(env('CONTACT_FORM_TO'))
        ? (string) env('CONTACT_FORM_TO')
        : (filled(env('MAIL_CONTACT_TO'))
            ? (string) env('MAIL_CONTACT_TO')
            : (filled(env('SENDGRID_TO_EMAIL'))
                ? (string) env('SENDGRID_TO_EMAIL')
                : 'contact@newlifebiblechurch.net')),

    /*
    |--------------------------------------------------------------------------
    | Contact form anti-spam
    |--------------------------------------------------------------------------
    */

    /** Minimum milliseconds between page load (form_started_at) and submit. */
    'min_fill_ms' => (int) env('CONTACT_MIN_FILL_MS', 3000),

    /** Maximum age of form_started_at before the token is rejected (ms). */
    'max_form_age_ms' => (int) env('CONTACT_MAX_FORM_AGE_MS', 3_600_000),

    /** Allowed clock skew: form_started_at may be this many ms in the "future". */
    'clock_skew_ms' => (int) env('CONTACT_CLOCK_SKEW_MS', 120_000),

    /** Reject messages containing more than this many http(s) URLs. */
    'max_urls_in_message' => (int) env('CONTACT_MAX_URLS', 6),

];
