<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Student
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

           if($user->hasAnyRole('student'))
           {
           return $next($request);
           }

           $destinations = ['school','teacher'];

           foreach($destinations as $destination){

            if ($user->hasAnyRole($destination))
            {
             return redirect(route($destination));
            }
           
           }
    }
}
