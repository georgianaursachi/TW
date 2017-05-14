<?php

return [
    'oracle' => [
        'driver'        => 'oracle',
        'tns'           => env('DB_TNS', ''),
        'host'          => env('DB_HOST', ''),
        'port'          => env('DB_PORT', '1521'),
        'database'      => env('DB_DATABASE', 'ConDr'),
        'username'      => env('DB_USERNAME', 'MADALINA'),
        'password'      => env('DB_PASSWORD', 'MADALINA'),
        'charset'       => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'        => env('DB_PREFIX', ''),
        'prefix_schema' => env('DB_SCHEMA_PREFIX', ''),
    ],
];
