<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
	'google' => [
        'client_id' => '258690452219-6q6deo6dbf9np1gr2k8r9ame2leec6rj.apps.googleusercontent.com',
        'client_secret' => 'jcjQfN7671xIA7jklaXJbJEq',
        'redirect' => 'http://localhost/PPL-A4/betterpet/public/register/gCallBack',
    ],
    'facebook' => [
        'client_id' => '602542843247099',
        'client_secret' => '5d9a4714898ba30bcc27f723d69d43b1',
        'redirect' => 'http://localhost/PPL-A4/betterpet/public/register/fCallBack',
    ],
];
