<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send all email
    | messages unless another mailer is explicitly specified when sending
    | the message. All additional mailers can be configured within the
    | "mailers" array. Examples of each type of mailer are provided.
    |
    */

    'default' => env('MAIL_MAILER', 'log'),

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may configure all of the mailers used by your application plus
    | their respective settings. Several examples have been configured for
    | you and you are free to add your own as your application requires.
    |
    | Laravel supports a variety of mail "transport" drivers that can be used
    | when delivering an email. You may specify which one you're using for
    | your mailers below. You may also add additional mailers if needed.
    |
    | Supported: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "resend", "log", "array",
    |            "failover", "roundrobin"
    |
    */

    'mailers' => [

        /*
        | SendGrid via HTTPS Web API (symfony/sendgrid-mailer). Preferred on Forge and other hosts that block SMTP :587.
        | Set SENDGRID_API_KEY and either MAIL_MAILER=sendgrid or rely on AppServiceProvider to switch
        | away from log/array when the key is present (not in testing).
        */
        'sendgrid' => [
            'transport' => 'sendgrid-api',
            'key' => env('SENDGRID_API_KEY'),
        ],

        /*
        | Optional: SendGrid over SMTP if your network allows it (e.g. local). Use MAIL_MAILER=sendgrid-smtp.
        */
        'sendgrid-smtp' => [
            'transport' => 'smtp',
            'host' => env('SENDGRID_SMTP_HOST', 'smtp.sendgrid.net'),
            'port' => (int) env('SENDGRID_SMTP_PORT', 587),
            'username' => env('SENDGRID_SMTP_USERNAME', 'apikey'),
            'password' => env('SENDGRID_API_KEY'),
            'timeout' => (int) env('MAIL_SMTP_TIMEOUT', 15),
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url((string) env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],

        'smtp' => [
            'transport' => 'smtp',
            'scheme' => env('MAIL_SCHEME'),
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', '127.0.0.1'),
            'port' => env('MAIL_PORT', 2525),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => (int) env('MAIL_SMTP_TIMEOUT', 15),
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url((string) env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'),
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'resend' => [
            'transport' => 'resend',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
            'retry_after' => 60,
        ],

        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'ses',
                'postmark',
            ],
            'retry_after' => 60,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all emails sent by your application to be sent from
    | the same address. Here you may specify a name and address that is
    | used globally for all emails that are sent by your application.
    |
    */

    'from' => [
        // MAIL_* is standard Laravel; SENDGRID_FROM_* matches common site-specific .env naming.
        'address' => filled(env('MAIL_FROM_ADDRESS'))
            ? (string) env('MAIL_FROM_ADDRESS')
            : (string) env('SENDGRID_FROM_EMAIL', 'hello@example.com'),
        'name' => filled(env('MAIL_FROM_NAME'))
            ? (string) env('MAIL_FROM_NAME')
            : (string) env('SENDGRID_FROM_NAME', env('APP_NAME', 'Laravel')),
    ],

];
