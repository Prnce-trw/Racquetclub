<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Receptionist
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
        // dd($roles);
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
        // return redirect('/');
        // dd('receptions');
        // if (auth('web')->user()->capacity == '3') {
        //     return $next($request);    
        // }
        return redirect('/login-user');
    }
}
