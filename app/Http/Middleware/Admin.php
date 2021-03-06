<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        if (!Auth::check()) {
            return redirect()->route('login');
            }
      
           $user = Auth::user();
      
           if($user->hasAnyRole('admin'))
           {
              return $next($request);
           }  
           abort(403); 
    }
}
