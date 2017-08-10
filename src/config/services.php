<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('UNKNOWN_CI_MAILGUN_DOMAIN'),
        'secret' => env('UNKNOWN_CI_MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('UNKNOWN_CI_SES_KEY'),
        'secret' => env('UNKNOWN_CI_SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('UNKNOWN_CI_SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('UNKNOWN_CI_STRIPE_KEY'),
        'secret' => env('UNKNOWN_CI_STRIPE_SECRET'),
    ],

];
