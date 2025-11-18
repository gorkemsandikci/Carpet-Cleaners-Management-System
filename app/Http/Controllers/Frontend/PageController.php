<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Abouts;
use App\Models\Company;
use App\Models\ContactMessage;
use App\Models\Gallery;
use App\Models\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutUs()
    {
        $companyId = auth()->check() && auth()->user()->company_id 
            ? auth()->user()->company_id 
            : Company::first()?->id;

        $about_us = Abouts::where('company_id', $companyId)
            ->where('key', 'about_us')
            ->first();

        // Create default if not exists
        if (!$about_us) {
            $about_us = (object)[
                'title' => 'About Us',
                'name' => 'About Us',
                'slug' => 'about-us',
                'content' => '<p>Content will be added soon.</p>',
            ];
        }

        return view('frontend.pages.about-us', compact('about_us'));
    }

    public function ourServices()
    {
        $companyId = auth()->check() && auth()->user()->company_id 
            ? auth()->user()->company_id 
            : Company::first()?->id;

        $services = Service::where('company_id', $companyId)
            ->where('status', '1')
            ->get();
        return view('frontend.pages.our-services', compact('services'));
    }

    public function contactUs()
    {
        return view('frontend.pages.contact-us');
    }

    public function contactStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $companyId = auth()->check() && auth()->user()->company_id 
            ? auth()->user()->company_id 
            : Company::first()?->id;

        ContactMessage::create([
            'company_id' => $companyId,
            ...$validated
        ]);

        return back()->with('success', 'Your message has been sent successfully!');
    }

    public function gallery()
    {
        $companyId = auth()->check() && auth()->user()->company_id 
            ? auth()->user()->company_id 
            : Company::first()?->id;

        $images = Gallery::where('company_id', $companyId)
            ->where('type', 'image')
            ->where('status', '1')
            ->orderBy('order')
            ->get();

        $videos = Gallery::where('company_id', $companyId)
            ->where('type', 'video')
            ->where('status', '1')
            ->orderBy('order')
            ->get();

        return view('frontend.pages.gallery', compact('images', 'videos'));
    }

    public function serviceDetail($slug)
    {
        $companyId = auth()->check() && auth()->user()->company_id 
            ? auth()->user()->company_id 
            : Company::first()?->id;

        $service = Service::where('company_id', $companyId)
            ->where('slug', $slug)
            ->where('status', '1')
            ->firstOrFail();

        // Get related services (same company, different service, limit 3)
        $relatedServices = Service::where('company_id', $companyId)
            ->where('status', '1')
            ->where('id', '!=', $service->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('frontend.pages.service-detail', compact('service', 'relatedServices'));
    }
}
