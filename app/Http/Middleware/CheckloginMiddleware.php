<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class CheckloginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        if(Auth::check()){
                // lấy thông tin khi user đã đăng nhập 
                $user = Auth::user();
                // dd($user->routes());
                // kiểm tra người dùng 
                $route = $request->route()->getName();
                if($user->cant($route)){
                    return redirect()->route('error',['code'=>403]);
                }
                    
                // dd($user->can($route));
           
                // dd($route);
            return $next($request);
        }
        return redirect()->route('admin-login');
    }
}
