<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RedirectIfAuthenticated
{

    protected $excludeRoutes = [
            '',
            'login',
            'logout',
            'home',
            'quem-somos',
            'contato',
            'blog',
            'orcamento-plano',
            'orcamento-servico',
            'register' //remover
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

        if (!Auth::guard($guard)->check() && !in_array($route, $this->excludeRoutes)) {
            return redirect('/login');
        }

        return $next($request);
    }
}
