<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckLogin
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
        if(Auth::check()) {
            if(Auth::user()->role == 'admin'){
                return redirect()->route('admin-panel');
            }elseif(Auth::user()->role == 'editor') {
                return redirect()->route('admin-panel');
            }else {
                return redirect()->route('index');
            }
    
        }
        return $next($request);
    }
}
