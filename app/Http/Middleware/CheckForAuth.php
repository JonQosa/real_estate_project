<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckForAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the current route is 'admin/login'
        if ($request->routeIs('admin.login')) {
            // Check if the user is authenticated
            if (Auth::guard('admin')->check()) {
                // Redirect authenticated users to the dashboard
                return redirect()->route('admins.dashboard');
            }
        }

        // Continue with the request if not authenticated or not accessing 'admin/login'
        return $next($request);
    }
}
