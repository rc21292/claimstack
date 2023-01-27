<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                switch ($guard) {
                    case 'admin':
                        return redirect(RouteServiceProvider::ADMIN);
                        break;
                    case 'user':
                        return redirect(RouteServiceProvider::USER);
                        break;
                    case 'employee':
                        return redirect(RouteServiceProvider::EMPLOYEE);
                        break;
                    case 'hospital':
                        return redirect(RouteServiceProvider::HOSPITAL);
                        break;
                    case 'associate-partner':
                        return redirect(RouteServiceProvider::ASSOCIATE);
                        break;
                    default:
                        return redirect(RouteServiceProvider::HOME);
                        break;
                }
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
