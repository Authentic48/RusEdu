<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class School
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

     if($user->hasAnyRole('school'))
     {
        return $next($request);
     }

     $destinations = ['student','teacher'];

     foreach($destinations as $destination){

     if ($user->hasAnyRole($destination))
     {
       return redirect(route($destination));
     }
    }
  }

  }