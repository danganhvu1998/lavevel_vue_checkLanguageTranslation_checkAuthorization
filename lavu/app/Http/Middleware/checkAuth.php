<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class checkAuth
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
        $user = User::where("id", $request->user_id)
            ->where("remember_token", $request->user_remember_token)
            ->first();
        if($user==NULL){
            return redirect("/api/error/access_denied");
        } else {
            return $next($request);
        }
    }
}
