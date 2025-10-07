<?php

return [

    'name' => env('APP_NAME', 'Language Cards Blog'),

    'env' => env('APP_ENV', 'production'),

    'debug' => (bool) env('APP_DEBUG', false),

    'url' => env('APP_URL', 'http://localhost:8000'),

    'timezone' => 'Europe/Kyiv',

    'locale' => env('APP_LOCALE', 'uk'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'uk'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'uk_UA'),

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', (string) env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];