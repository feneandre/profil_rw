<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!auth()->guard($role)->check()) {
            return redirect('login');
        }
        return $next($request);
    }
}