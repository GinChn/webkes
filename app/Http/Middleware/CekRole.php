<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CekRole
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
        $user = [
            1 => 'Admin', 
            'User'
        ];

        $level = session('auth')->level_name;
        if(in_array($level, $user)){
            return $next($request);
        }
        return redirect('login');
    }
}
