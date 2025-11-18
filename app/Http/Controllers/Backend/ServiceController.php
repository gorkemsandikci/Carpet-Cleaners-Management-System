<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $companyId = Auth::user()->company_id;
        $services = Service::where('company_id', $companyId)->orderBy('created_at', 'desc')->get();
        return view('backend.pages.service.index', compact('services'));
    }

    public function create()
    {
        return view('backend.pages.service.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_text' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:0,1',
        ]);

        $companyId = Auth::user()->company_id;

        $data = $validated;
        $data['company_id'] = $companyId;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($data);

        return redirect()->route('panel.service.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        $companyId = Auth::user()->company_id;
        if ($service->company_id != $companyId) {
            abort(403);
        }
        return view('backend.pages.service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $companyId = Auth::user()->company_id;
        if ($service->company_id != $companyId) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_text' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:0,1',
        ]);

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($validated);

        return redirect()->route('panel.service.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $companyId = Auth::user()->company_id;
        if ($service->company_id != $companyId) {
            abort(403);
        }

        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('panel.service.index')
            ->with('success', 'Service deleted successfully.');
    }
}
