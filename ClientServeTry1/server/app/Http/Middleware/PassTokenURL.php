<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PassTokenURL
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->input('token');
        if (!$token) {
            return response()->json([
                'message' => 'unauthenticated'
            ], 401);
        }
        
        $request->headers->set('Authorization', "Bearer " . $token);
        return $next($request);
    }
}
