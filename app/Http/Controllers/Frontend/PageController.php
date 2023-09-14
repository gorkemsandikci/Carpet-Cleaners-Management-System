<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Abouts;
use App\Models\Service;

class PageController extends Controller
{
    public function aboutUs()
    {
        $about_us = Abouts::where('key', 'about_us')->first();
        return view('frontend.pages.about-us', compact('about_us'));
    }
    public function ourServices()
    {
        $services = Service::where('status', '1')->get();
        return view('frontend.pages.our-services', compact('services'));
    }
    public function contactUs()
    {
        return view('frontend.pages.contact-us');
    }
    public function gallery()
    {
        return view('frontend.pages.gallery');
    }

    public function serviceDetail($slug)
    {
//        $service = Service::whereSlug($slug)
//            ->where('status', '1')
//            ->firstOrFail();

    }
}
