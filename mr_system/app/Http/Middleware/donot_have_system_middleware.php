<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

use Closure;
use App\systems;

class donot_have_system_middleware
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
        $id = Auth::id();
        if(!Schema::hasTable('system_' . $id) && systems::where('manger_id' , $id)->count() === 0)
        {
            return $next($request);
        }
        else
            return redirect('/home');
    }
}
