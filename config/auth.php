<?php

return [
    'defaults' => [
        'guard' => 'user',
        'passwords' => 'user',
    ],

    'guards' => [
        'user' => [
            'driver' => 'session',
            'provider' => 'user',
        ],
            'admin' => [
            'driver' => 'session',
            'provider' => 'admin',
        ],
    ],
    'providers' => [
        'user' => [
            'driver' => 'eloquent',
            'model' => 'App\User',
        ],
        'admin' => [
            'driver' => 'eloquent',
            'model' => 'App\AdminUser',
        ],
    ],
    'passwords' => [
        'user' => [
            'provider' => 'user',
            'email' => 'website.auth.emails.password',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'admin' => [
            'provider' => 'admin',
            'email' => 'auth.emails.password',
            'table' => 'password_resets',
            'expire' => 60,
        ]
    ]
];
