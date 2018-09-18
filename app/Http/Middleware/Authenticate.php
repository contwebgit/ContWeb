<?php

namespace App\Http\Middleware;


use Illuminate\Support\Facades\Auth;
use Closure;

class Authenticate
{
    protected $exceptRoutes = [
        'login',
        'logout',
        'quem-somos',
        'blogs',
        'contato',
        'termos-de-uso'
    ];

    public function handle($request, Closure $next)
    {
        $route = $request->route()->getName();


        if (Auth::check() and $route == 'login') {
            return redirect()->route('admin');
        }

        if(!in_array($route, $this->exceptRoutes) and $route != null) {
            if (!Auth::check()) {
                return redirect()->route('login');
            }
        }

        return $next($request);
    }
}