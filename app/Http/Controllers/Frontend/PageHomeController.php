<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class PageHomeController extends Controller
{
    public function index()
    {
        return view('frontend.pages.index');
    }
}
