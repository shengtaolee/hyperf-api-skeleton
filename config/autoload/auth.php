<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
return [
    'password_salt' => env('PASSWORD_SALT', 'hyperf'),
    'token' => [
        'driver' => env('token_driver', 'jwt'),
        'simple' => [
            'token_period_ttl' => env('token_period_ttl', 604800),
        ],
        'jwt' => [
            'token_period_ttl' => env('token_period_ttl', 604800),
            'refresh_period_ttl' => env('refresh_period_ttl', 604800),
        ],
    ],
];
