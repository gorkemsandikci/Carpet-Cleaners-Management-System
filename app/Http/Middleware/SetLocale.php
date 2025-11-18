<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if locale is set in session, default to 'tr'
        $locale = Session::get('locale', 'tr');
        
        // Validate locale (only allow tr and en)
        if (!in_array($locale, ['tr', 'en'])) {
            $locale = 'tr';
        }
        
        // Set the application locale
        App::setLocale($locale);
        
        // Share locale to views
        view()->share('currentLocale', $locale);
        
        return $next($request);
    }
}

