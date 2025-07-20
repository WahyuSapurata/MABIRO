<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->role == 'biro') {
                    return redirect()->route('biro.dashboard-biro');
                } else if (Auth::user()->role == 'keuangan') {
                    return redirect()->route('keuangan.dashboard-keuangan');
                } else if (Auth::user()->role == 'inventaris') {
                    return redirect()->route('inventaris.dashboard-inventaris');
                } else if (Auth::user()->role == 'penghuni') {
                    return redirect()->route('beranda');
                }
            }
        }

        return $next($request);
    }
}
