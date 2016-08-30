<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $lang = $request->route('lang')!=null  ? $request->route('lang') : Config::get('app.locale');
        App::setLocale( $lang );
        return $next($request);
    }
}







