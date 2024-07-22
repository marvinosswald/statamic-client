<?php

return [
    'host_url' => env('STATAMIC_HOST_URL'),
    'pass_through' => [
        'enabled' => env('STATAMIC_PASSTHROUGH_ENABLED', true),
        'prefix' => 'cms',
        'middleware' => ['web'],
        'view' => 'statamic-client::pass-through',
        'cache' => [
            'enabled' => env('STATAMIC_PASSTHROUGH_CACHE_ENABLED', true),
            'ttl' => env('STATAMIC_PASSTHROUGH_CACHE_TTL', 600),
        ],
    ],
    'discover' => [
        'enabled' => env('STATAMIC_DISCOVER_ENABLED', true),
    ],
];
