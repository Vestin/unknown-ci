<?php

namespace App\Http\Middleware;

use App\UserAttr;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ActiveUser
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
        if(Auth::guest()){
            return redirect()->to(route('login'));
        }

        $user = Auth::user();
        $this->activeFirstUser($user);
        if (!$user->isActive()) {
            abort(403, 'User is not active. Please contact site administrator.');
        }

        return $next($request);
    }

    private function activeFirstUser($user)
    {
        if (Cache::get('active-first-user')) {
            return ;
        }

        if (UserAttr::count() > 0) {
            return ;
        }

        $userAttr = new UserAttr();
        $userAttr->user_id = $user->id;
        $userAttr->super_admin = true;
        $userAttr->active = true;
        $userAttr->save();
    }
}
