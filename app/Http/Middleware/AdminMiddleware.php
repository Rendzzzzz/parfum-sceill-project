<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        \Log::info('AdminMiddleware checking...');

        // Check if user is authenticated (using Laravel auth)
        if (!Auth::check()) {
            \Log::warning('AdminMiddleware: User not authenticated');
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        // Check if user is admin (email check)
        if (Auth::user()->email !== 'admin@sceill.com') {
            \Log::warning('AdminMiddleware: User is not admin', [
                'user_email' => Auth::user()->email,
                'expected' => 'admin@sceill.com'
            ]);
            return redirect('/')->with('error', 'Access denied. Admin only.');
        }

        \Log::info('AdminMiddleware: Access granted');
        return $next($request);
    }
}
