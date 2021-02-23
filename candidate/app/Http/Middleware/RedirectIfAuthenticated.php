<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if($guard == 'admin') {
                return redirect()->to(route('admin.dashboard'));
            }
            elseif($guard == 'candidate') {
                return redirect()->to(route('candidate.dashboard'));
            }
            elseif($guard == 'visitor') {
                return redirect()->to(route('visitor.dashboard'));
            }
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
