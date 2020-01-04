<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

use Alert;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();
            if ($user->is_admin != 1) {
                Alert::warning('Warning Message', '您不是管理员，无法执行此操作');
                return redirect('/');
            } else {
                return redirect('/home');
            }
        } else {
            Alert::error('Error Message', '请先登录');
            return redirect('/');
        }
    }
}
