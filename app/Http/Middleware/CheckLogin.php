<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;


class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $email = Cookie::get('email');
        $lk = Cookie::get('lk');
        if ($lk == md5($email . config('user.salt'))&&!empty($email)&&!empty($lk)) {
            return $next($request);
        }else{
            return response()->json(['need_login'=>1]);
        }
    }
}
