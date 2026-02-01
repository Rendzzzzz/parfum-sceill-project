<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SimpleAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Debug logging
        \Log::info('SimpleAuth middleware checking: ' . ($request->session()->get('user_email') ?? 'guest'));

        // Check if user is logged in via session
        if (!$request->session()->has('user_id')) {
            \Log::warning('SimpleAuth: User not authenticated, redirecting to login');
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        return $next($request);
    }
}
