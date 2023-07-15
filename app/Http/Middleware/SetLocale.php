<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $lang = $request->segment(3);
        $supportLanguages = config('support-languages');

        if (array_key_exists($lang, $supportLanguages)) {
            app()->setLocale($lang);
            return $next($request);
        } else {
            return response(['error' => 'This language is not found!'], Response::HTTP_NOT_FOUND);
        }
    }
}
