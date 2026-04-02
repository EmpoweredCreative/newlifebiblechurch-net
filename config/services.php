<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'sendgrid' => [
        'api_key' => env('SENDGRID_API_KEY'),
        // Verified sender for SendGrid: prefer SENDGRID_FROM_*; MAIL_* is fallback for the same values.
        'from_email' => env('SENDGRID_FROM_EMAIL') ?: env('MAIL_FROM_ADDRESS'),
        'from_name' => env('SENDGRID_FROM_NAME') ?: env('MAIL_FROM_NAME') ?: env('APP_NAME', 'Laravel'),
        // Contact form staff inbox only (see config/contact.php for delivery address resolution).
        'to_email' => env('SENDGRID_TO_EMAIL'),
        'to_name' => env('SENDGRID_TO_NAME'),
    ],

];
