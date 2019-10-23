<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\systems;

class have_create_1_middleware
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
        $id= Auth::id();
        if(Schema::hasTable('system_' . $id) && systems::where('manger_id' , $id)->count() != 0 && !Schema::hasTable('system_' . $id . '_info'))
        {
            return $next($request);
        }
        else
        {
            return redirect('/home');
        }
        
    }
}
