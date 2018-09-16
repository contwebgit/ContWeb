<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    protected $exceptRoutes = [
        'login',
        'register'
    ];


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $route = $request->route()->getName();

        if(!in_array($route, $this->exceptRoutes)) {
            if (Auth::check()) {
                return redirect()->route('dsge');
            }
        }
        return $next($request);
    }
}
