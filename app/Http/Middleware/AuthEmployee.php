<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Alert;

class AuthEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (empty(session('auth.admin'))) {
            Alert::warning('Login', 'Login before access admin page.');
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
