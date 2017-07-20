<?php

namespace App\Http\Middleware;

use Closure;

class BasicHttpAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Exit';
            exit;
        } else {
            if($_SERVER['PHP_AUTH_USER']!==config('app.basicAuth.user') || $_SERVER['PHP_AUTH_PW']!=config('app.basicAuth.password')){
                header('WWW-Authenticate: Basic realm="My Realm"');
                header('HTTP/1.0 401 Unauthorized');
                echo 'User / Password Error.';
                exit;
            }
        }

        return $next($request);
    }
}
