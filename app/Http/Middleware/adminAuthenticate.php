<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use phpDocumentor\Reflection\Types\Parent_;

class adminAuthenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $guards;


    public function handle($request, Closure $next, ...$guards)
    {
        $this->guards = $guards;

        return parent::handle($request, $next, ...$guards);
    }


    public function redirectTo( $request)
    {
        if (! $request->expectsJson()){

            if (Arr::first($this->guards) === 'admin') {
                
                    return route('admin.login');
            
               }

               return route('login');

          
        }

        return next($request);
       

    }
}
