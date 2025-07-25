<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAdminAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard'); // Redirect to dashboard if already logged in
        }

        return $next($request); // Continue to login page if not logged in
    }
}
