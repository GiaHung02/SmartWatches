<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use \App\Http\Middleware\ForAdmin;
use Sentinel;

class ForAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Sentinel::getUser();
        $role = Sentinel::getRoleRepository()->findBySlug('admin');
        if(!$user -> inRole($role)) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}