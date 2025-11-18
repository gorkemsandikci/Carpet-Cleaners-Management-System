<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomepageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomepageContentController extends Controller
{
    public function index()
    {
        $companyId = Auth::user()->company_id;
        $contents = HomepageContent::where('company_id', $companyId)
            ->orderBy('section_key')
            ->orderBy('order')
            ->get()
            ->groupBy('section_key');
        return view('backend.pages.homepage-content.index', compact('contents'));
    }

    public function create()
    {
        return view('backend.pages.homepage-content.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'section_key' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'status' => 'required|in:0,1',
        ]);

        $companyId = Auth::user()->company_id;
        $data = $validated;
        $data['company_id'] = $companyId;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('homepage', 'public');
        }

        HomepageContent::create($data);

        return redirect()->route('panel.homepage-content.index')
            ->with('success', 'Homepage content created successfully.');
    }

    public function edit(HomepageContent $homepageContent)
    {
        $companyId = Auth::user()->company_id;
        if ($homepageContent->company_id != $companyId) {
            abort(403);
        }
        return view('backend.pages.homepage-content.edit', compact('homepageContent'));
    }

    public function update(Request $request, HomepageContent $homepageContent)
    {
        $companyId = Auth::user()->company_id;
        if ($homepageContent->company_id != $companyId) {
            abort(403);
        }

        $validated = $request->validate([
            'section_key' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'status' => 'required|in:0,1',
        ]);

        if ($request->hasFile('image')) {
            if ($homepageContent->image) {
                Storage::disk('public')->delete($homepageContent->image);
            }
            $validated['image'] = $request->file('image')->store('homepage', 'public');
        }

        $homepageContent->update($validated);

        return redirect()->route('panel.homepage-content.index')
            ->with('success', 'Homepage content updated successfully.');
    }

    public function destroy(HomepageContent $homepageContent)
    {
        $companyId = Auth::user()->company_id;
        if ($homepageContent->company_id != $companyId) {
            abort(403);
        }

        if ($homepageContent->image) {
            Storage::disk('public')->delete($homepageContent->image);
        }

        $homepageContent->delete();

        return redirect()->route('panel.homepage-content.index')
            ->with('success', 'Homepage content deleted successfully.');
    }
}
