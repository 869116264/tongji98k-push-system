<?php

namespace App\Http\Middleware;

use Closure;

class CheckEmail
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
        return $next($request);
    }

    /**
     * check is the email  valid or not
     *
     * return state code
     * 1 means the email is an invalid email
     * 2 means the email has been  already register
     * 3 means the email is an valid email
     *
     * @param  $email
     * @return int
     */
    private function checkEmail($email)
    {
        if($email){

        }
    }
}
