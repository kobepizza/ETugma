<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class PreventBackHistory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Ensure it is an instance of Illuminate\Http\Response
        if ($response instanceof \Illuminate\Http\Response) {
            $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
                     ->header('Cache-Control', 'post-check=0, pre-check=0', false)
                     ->header('Pragma', 'no-cache');
        }

        return $response;
    }
    
}