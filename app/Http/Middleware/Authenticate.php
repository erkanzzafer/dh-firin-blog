<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\URL;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if($request->routeIs('admin.*')){
                session()->flash('fail','Önce giriş yapmalısınız.');
                return route('admin.login',['fail'=>true,'returnURL'=>URL::current()]);
            }
        }
    }
}
