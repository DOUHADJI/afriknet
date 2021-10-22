<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (! $request->expectsJson()){

      

          
        }

        if(Auth::guard('admin')->user()){

            /* dd("yes I am a admin"); */

            dd('Admin middleware');


            abort(404);
                
                return  view('errors.404');
        }
        else {

            dd('we are going to admin login');


                return route('admin.login');

        }

        return $next($request);
    }
}
