<?php

namespace App\Http\Middleware;

use Closure;
use App;


class SetLocale
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

        if (session()->has('locale')) {
            $locale = session()->get('locale');
        } else {
            $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
            if ($locale != 'ru' && $locale != 'en') {
                $locale = 'en';
            }
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
