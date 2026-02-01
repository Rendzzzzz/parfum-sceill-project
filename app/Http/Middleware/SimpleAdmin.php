<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SimpleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Debug logging
        \Log::info('SimpleAdmin middleware checking for admin: ' . ($request->session()->get('user_email') ?? 'guest'));

        // Check if user is logged in
        if (!$request->session()->has('user_id')) {
            \Log::warning('SimpleAdmin: User not authenticated');
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        // Check if user is admin
        if (!$request->session()->get('is_admin')) {
            \Log::warning('SimpleAdmin: User is not admin', [
                'user_email' => $request->session()->get('user_email'),
                'is_admin' => $request->session()->get('is_admin')
            ]);
            return redirect('/')->with('error', 'Access denied. Admin only.');
        }

        \Log::info('SimpleAdmin: Access granted for admin user');
        return $next($request);
    }
}
