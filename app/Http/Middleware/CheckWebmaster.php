<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckWebmaster
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario es un webmaster
        if (auth()->check() && auth()->user()->webmaster) {
            // Redirige a la ruta de solicitudes
            return redirect()->route('solicitudes');
        }

        // Si no es un webmaster, continúa con la solicitud
        return $next($request);
    }
}
