<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class PageController extends Controller
{
    public function aboutUs()
    {
        return view('frontend.pages.about-us');
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
