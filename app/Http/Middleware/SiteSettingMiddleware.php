<?php

namespace App\Http\Middleware;

use App\Models\Company;
use App\Models\SiteSetting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteSettingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get company ID from user or default to first company
        $companyId = auth()->check() && auth()->user()->company_id 
            ? auth()->user()->company_id 
            : Company::first()?->id;

        if ($companyId) {
            $settings = SiteSetting::where('company_id', $companyId)
                ->pluck('data', 'name')
                ->toArray();
        } else {
            $settings = [];
        }

        view()->share(['settings' => $settings]);

        return $next($request);
    }
}
