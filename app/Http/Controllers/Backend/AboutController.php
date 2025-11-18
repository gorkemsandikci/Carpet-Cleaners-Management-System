<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Abouts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function index()
    {
        $companyId = Auth::user()->company_id;
        $about = Abouts::where('company_id', $companyId)
            ->where('key', 'about_us')
            ->first();
        return view('backend.pages.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $companyId = Auth::user()->company_id;

        Abouts::updateOrCreate(
            [
                'company_id' => $companyId,
                'key' => 'about_us'
            ],
            [
                'name' => $request->name,
                'title' => $request->title,
                'content' => $request->content
            ]
        );

        return back()->with('success', 'About page updated successfully!');
    }
}
