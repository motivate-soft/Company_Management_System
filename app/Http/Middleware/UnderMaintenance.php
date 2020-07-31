<?php

namespace App\Http\Middleware;

use App\Model\Setting;
use Closure;
use Illuminate\Support\Facades\Auth;

class UnderMaintenance
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
        $setting = Setting::findOrfail(1);
        $underMaintenance = $setting->under_maintenance;
        if (!Auth::check() && $underMaintenance){
            return response()->view('error-comingsoon');
        }
        return $next($request);
    }
}
