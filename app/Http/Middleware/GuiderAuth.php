<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class GuiderAuth
{
    public function handle($request, Closure $next)
    {
        if (!Session::get('guider_logged_in')) {
            return redirect()->route('guider.login');
        }
        return $next($request);
    }
}
