<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    // protected function redirectTo(Request $request): ?string
    // {
    //     dd($request);
    //     return $request->expectsJson() ? null : route('admin.login');
    // }

    protected function redirectTo(Request $request): ?string
    {
        // If the request expects JSON, return null to avoid redirection
        if ($request->expectsJson()) {
            return null;
        }

        // Redirect to the admin login page if the request is not expecting JSON
        return route('admin.login');
    }
}
