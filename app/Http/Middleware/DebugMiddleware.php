<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DebugMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        \Log::info('Request', [
            'path' => $request->path(),
            'method' => $request->method(),
            'input' => $request->all()
        ]);
        
        $response = $next($request);
        
        \Log::info('Response', [
            'status' => $response->status()
        ]);
        
        return $response;
    }
}