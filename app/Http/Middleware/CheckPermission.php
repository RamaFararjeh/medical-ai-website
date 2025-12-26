<?php
// app/Http/Middleware/CheckPermission.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        $user = $request->user();

        if (!$user) {
            abort(403, 'Unauthorized');
        }

        // assuming: user -> role -> permissions
        $hasPermission = $user->role
            && $user->role->permissions()->where('name', $permission)->exists();

        if (!$hasPermission) {
            abort(403, 'Forbidden - Missing permission');
        }

        return $next($request);
    }
}
