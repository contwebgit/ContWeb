<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    protected $excludeRoutes = [
            'login',
            'logout',
            'home',
            'quem-comos',
            'contato'
        ];

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
        $route = $request->route()->getName();

        if (Auth::guard($guard)->check()) {
            if($route == 'login') {
                return redirect('/admin');
            }
        }

        return $next($request);
    }
}
