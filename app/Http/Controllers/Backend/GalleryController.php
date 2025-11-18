<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $companyId = Auth::user()->company_id;
        $galleries = Gallery::where('company_id', $companyId)->orderBy('order')->get();
        return view('backend.pages.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('backend.pages.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'type' => 'required|in:image,video',
            'image' => 'required_if:type,image|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url' => 'required_if:type,video|url',
            'order' => 'nullable|integer',
            'status' => 'required|in:0,1',
        ]);

        $companyId = Auth::user()->company_id;
        $data = $validated;
        $data['company_id'] = $companyId;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }

        Gallery::create($data);

        return redirect()->route('panel.gallery.index')
            ->with('success', 'Gallery item created successfully.');
    }

    public function edit(Gallery $gallery)
    {
        $companyId = Auth::user()->company_id;
        if ($gallery->company_id != $companyId) {
            abort(403);
        }
        return view('backend.pages.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $companyId = Auth::user()->company_id;
        if ($gallery->company_id != $companyId) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'type' => 'required|in:image,video',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url' => 'nullable|url',
            'order' => 'nullable|integer',
            'status' => 'required|in:0,1',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            $validated['image'] = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update($validated);

        return redirect()->route('panel.gallery.index')
            ->with('success', 'Gallery item updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        $companyId = Auth::user()->company_id;
        if ($gallery->company_id != $companyId) {
            abort(403);
        }

        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('panel.gallery.index')
            ->with('success', 'Gallery item deleted successfully.');
    }
}
