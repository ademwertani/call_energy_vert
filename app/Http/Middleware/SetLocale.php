<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $availableLocales = ['fr', 'en', 'es'];

        $locale = session('locale', config('app.locale', 'fr'));

        if (! in_array($locale, $availableLocales)) {
            $locale = 'fr';
        }

        app()->setLocale($locale);

        return $next($request);
    }
}