<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */

    public function handle($request, Closure $next, $guard = null)
    {
        $auth = Auth::guard($guard);

        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                //  return redirect()->guest('login');
                session()->flash('warning', 'У вас нет прав администратора');
                return redirect()->route('index');
            }
        }

        if (!$auth->user()->isAdmin()) {
            // return response('Access denied.', 401);
            session()->flash('warning', 'У вас нет прав администратора');
            return redirect()->route('index');
        }

        return $next($request);
    }

//    public function handle($request, Closure $next)
//    {
//        $user = Auth::user();
//
//        if (!$user->isAdmin()) {
//                session()->flash('warning', 'У вас нет прав администратора');
//                return redirect()->route('index');
//        }
//
//// как вариат 2
///        if ($user->is_admin != 1) {
//                session()->flash('warning', 'У вас нет прав администратора');
//                return redirect()->route('index');
//        }

//        return $next($request);
//
//    }
}
