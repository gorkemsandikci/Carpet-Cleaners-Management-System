<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class PageHomeController extends Controller
{
    public function index()
    {

        $services = Service::where('status', '1')->get();
        return view('frontend.pages.index', compact('services'));
    }
}
