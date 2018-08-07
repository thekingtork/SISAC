<?php

namespace Ngsoft\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;

class Docente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws AuthorizationException
     */
    public function handle($request, Closure $next)
    {
        if (! $request->user()->isDocente()){
            throw new AuthorizationException;
        }
        return $next($request);
    }
}