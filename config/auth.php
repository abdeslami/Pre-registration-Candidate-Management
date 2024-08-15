<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'etudiant' => [
            'driver' => 'session',
            'provider' => 'etudiants',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'etudiants'=> [
            'driver' => 'eloquent',
            'model' =>  App\Models\Etudiant::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'etudiants'=> [
            'provider' => 'etudiants',
        ],
    ],

    'password_timeout' => 10800,

];
