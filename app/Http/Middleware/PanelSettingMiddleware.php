<?php

namespace App\Http\Middleware;

use App\Models\SiteSetting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PanelSettingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $companyId = auth()->user()->company_id ?? null;

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
