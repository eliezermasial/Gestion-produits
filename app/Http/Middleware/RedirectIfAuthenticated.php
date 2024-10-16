<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
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
                return redirect()->route('dashboard')->with('success', 'Vous êtes déjà connecté.');
            }
        }

        //sauvegardage de l'url precedent
        if($request->method() == 'Get' && !str_contains($request->path(),'login'))
        {
            $request->session()->put('url.intended', url('previous'));
        }

        return $next($request);
    }
}
