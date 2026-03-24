<?php

return [
    'mode' => env('PAYDUNYA_MODE', 'test'), // Très important : 'test' par défaut

    'test' => [
        'master_key' => env('PAYDUNYA_MASTER_KEY'),
        'public_key' => env('PAYDUNYA_PUBLIC_KEY'),
        'private_key' => env('PAYDUNYA_PRIVATE_KEY'),
        'token'      => env('PAYDUNYA_TOKEN'),
    ],

    'live' => [
        'master_key' => env('PAYDUNYA_LIVE_MASTER_KEY'),
        'public_key' => env('PAYDUNYA_LIVE_PUBLIC_KEY'),
        'private_key' => env('PAYDUNYA_LIVE_PRIVATE_KEY'),
        'token'      => env('PAYDUNYA_LIVE_TOKEN'),
    ],
];
