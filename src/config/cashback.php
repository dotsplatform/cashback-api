<?php

return [
    'cashback-server' => [
       'url' => env('RESOURCES_CASHBACK_EXTERNAL_HOST', 'https://admin.dots.live/'),
       'token' => env('CASHBACK_INTERNAL_GATEWAY_TOKEN'),
    ]
];