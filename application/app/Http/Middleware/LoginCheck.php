<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginCheck
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
        if(Auth::guest()){
            return redirect()->route('logout');
        }
      /*  elseif (Auth::user()->user_type !=='USEO' &&  class_basename($request->route()->getController()) === 'USEOController'){
            return redirect()->route('logout');
        }*/

        return $next($request);
    }
}

