<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Abouts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index()
    {
        $about = DB::table('abouts')->where('key', 'about_us')->first();
        return view('backend.pages.about.index', compact('about'));
    }

    public function update(Request $request)
    {

        $about = Abouts::where('key', 'about_us')->first();

        $about->updateOrCreate(
            [
                'key' => 'about_us'
            ], [
                'name' => $request->name,
                'title' => $request->title,
                'content' => $request->content
            ]
        );

        return back()->withSuccess('Başarıyla güncellendi!');
    }
}
