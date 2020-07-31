<?php

namespace App\Http\Middleware;

use App\Model\Plugin;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPhoneVerified
{
    /**we
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $alsaad = Plugin::where('id', 1)->first();
        if ($alsaad->status == 1 && Auth::user()->phone_verefied == 0) {
            return redirect()->route('user.verifyView');
        }
        return $next($request);
    }
}
