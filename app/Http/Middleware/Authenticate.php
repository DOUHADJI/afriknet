<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    protected $guards;


    public function handle($request, Closure $next, ...$guards)
    {
        $this->guards = $guards;

        return parent::handle($request, $next, ...$guards);
    }


    protected function redirectTo($request)
    {
       

        if (! $request->expectsJson()) {

            
            if (Arr::first($this->guards) === 'admin') {

             if(Auth::guest()){

                 return route('admin.login');
             }

                abort (404);
                return  view('errors.404') /* route('admin.login') */  ;
            }

            if(Auth::guest()){
                 
                return route('login');
            }
            
            abort (404);
            return  view('errors.404') /* route('login') */  ;

        }

        return next($request);
    }
}
