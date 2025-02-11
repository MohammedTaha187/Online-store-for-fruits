<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Lang
{
    public function handle(Request $request, Closure $next)
    {
        // إذا كانت اللغة غير موجودة في الجلسة، اضبط الافتراضية "en"
        $lang = Session::get('lang', 'en');
        App::setLocale($lang);

        return $next($request);
    }
}
