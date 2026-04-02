<?php

return [

    'approver_email' => env('REGISTRATION_APPROVER_EMAIL', 'danny@empoweredcreative.co'),

    /** Signed approve/reject links expire after this many minutes (default 14 days). */
    'approve_link_ttl_minutes' => (int) env('REGISTRATION_APPROVE_LINK_TTL_MINUTES', 20_160),

    /** Minimum milliseconds between opening the form and submitting (anti-bot). */
    'min_fill_ms' => (int) env('REGISTRATION_MIN_FILL_MS', 3_000),

    /** Maximum age of the form timestamp before the submission is rejected (ms). */
    'max_form_age_ms' => (int) env('REGISTRATION_MAX_FORM_AGE_MS', 3_600_000),

    /** Allowed clock skew for form_started_at (ms). */
    'clock_skew_ms' => (int) env('REGISTRATION_CLOCK_SKEW_MS', 120_000),

];
