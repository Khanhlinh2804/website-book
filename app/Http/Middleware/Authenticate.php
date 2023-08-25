<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // nếu chưa đăng nhập 
            if (Auth::guard($guard)->check()) {
                // return redirect(RouteServiceProvider::HOME);
                return redirect()->route('login');
            }
            // lấy thông tin khi user đã đăng nhập 
            $user = Auth::user();
            // kiểm tra người dùng 
            $route = $request->route()->getName();
            dd($route);
            if($user->cant($route)){
                return redirect()->route('error',['code'=>403]);
            }
            // dd($user->can());
        }
        return $next($request);
    }

}
