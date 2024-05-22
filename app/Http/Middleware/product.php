<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class product
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = Auth::user();
            $user->is_admin ? true : abort(401, 'Unauthorized');
            define('executeTime', microtime(true) - LARAVEL_START);
        } catch (\Throwable $th) {
            abort(401, 'Unauthorized');
        }
      
        return $next($request);
    }
    public function terminate(Request $request, Response $response)
    {
        $exectuteTime = (microtime(true) - LARAVEL_START) - executeTime;
        
    }
}
