<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\HomepageContent;
use App\Models\Service;

class PageHomeController extends Controller
{
    public function index()
    {
        $companyId = auth()->check() && auth()->user()->company_id 
            ? auth()->user()->company_id 
            : Company::first()?->id;

        $services = Service::where('company_id', $companyId)
            ->where('status', '1')
            ->get();

        $sliders = HomepageContent::where('company_id', $companyId)
            ->where('section_key', 'slider')
            ->where('status', '1')
            ->orderBy('order')
            ->get();

        $aboutContent = HomepageContent::where('company_id', $companyId)
            ->where('section_key', 'about')
            ->where('status', '1')
            ->first();

        $features = HomepageContent::where('company_id', $companyId)
            ->where('section_key', 'features')
            ->where('status', '1')
            ->orderBy('order')
            ->get();

        $faqs = HomepageContent::where('company_id', $companyId)
            ->where('section_key', 'faq')
            ->where('status', '1')
            ->orderBy('order')
            ->get();

        $counters = HomepageContent::where('company_id', $companyId)
            ->where('section_key', 'counters')
            ->where('status', '1')
            ->orderBy('order')
            ->get();

        return view('frontend.pages.index', compact('services', 'sliders', 'aboutContent', 'features', 'faqs', 'counters'));
    }
}
