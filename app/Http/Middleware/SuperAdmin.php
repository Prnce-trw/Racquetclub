<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
            // dd('cs');
        $roleIds = ['super'=>'4','reception' => '3', 'cs' => '2', 'admin' => '1'];
        $allowedRoleIds = [];
        foreach ($roles as $role)
        {
           if(isset($roleIds[$role]))
           {
               $allowedRoleIds[] = $roleIds[$role];
           }
        }
        $allowedRoleIds = array_unique($allowedRoleIds); 

        if(Auth::check()) {
          if(in_array(Auth::user()->capacity, $allowedRoleIds)) {
            return $next($request);
          }
        }
        // if (auth('web')->user()->capacity == '2') {
        //     // dd('test');
        //     return $next($request);    
        // }
        // dd('test123');
        return redirect('/login-user');
        
    }
}
