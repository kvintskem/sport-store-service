<?php

declare(strict_types=1);

namespace App\Http\Middleware;

class VerifyCsrfToken
{
    protected $except = [
        '/telegram/webhook',
    ];
}
