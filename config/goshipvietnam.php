<?php

// config for BeetechAsia/GoShip
return [
    // @phpstan-ignore-next-line
    'url' => env('GOSHIP_API_URL', 'https://api.goship.io/api/v2'),
    // @phpstan-ignore-next-line
    'jwt' => env('GOSHIP_JWT', ''),
    // @phpstan-ignore-next-line
    'client_secret' => env('GOSHIP_CLIENT_SECRET', ''),
];
