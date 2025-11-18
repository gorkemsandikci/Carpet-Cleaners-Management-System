<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyId = Auth::user()->company_id;
        $settings = SiteSetting::where('company_id', $companyId)
            ->orderBy('group')
            ->orderBy('name')
            ->get()
            ->groupBy('group');

        return view('backend.pages.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:text,textarea,number,email,url,image,color,json',
            'group' => 'required|string|max:255',
            'data' => 'nullable',
        ]);

        $companyId = Auth::user()->company_id;

        // Handle different data types
        $data = $this->processData($validated['type'], $request->input('data'));

        SiteSetting::create([
            'company_id' => $companyId,
            'name' => $validated['name'],
            'type' => $validated['type'],
            'group' => $validated['group'],
            'data' => $data,
        ]);

        return redirect()->route('panel.settings.index')
            ->with('success', 'Setting created successfully.');
    }

    /**
     * Update settings in bulk
     */
    public function updateBulk(Request $request)
    {
        $companyId = Auth::user()->company_id;
        $settings = $request->input('settings', []);

        foreach ($settings as $id => $value) {
            $setting = SiteSetting::where('id', $id)
                ->where('company_id', $companyId)
                ->first();

            if ($setting) {
                $data = $this->processData($setting->type, $value);
                $setting->update(['data' => $data]);
            }
        }

        return redirect()->back()
            ->with('success', 'Settings updated successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteSetting $setting)
    {
        $companyId = Auth::user()->company_id;

        // Verify ownership
        if ($setting->company_id != $companyId) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:text,textarea,number,email,url,image,color,json',
            'group' => 'required|string|max:255',
            'data' => 'nullable',
        ]);

        $data = $this->processData($validated['type'], $request->input('data'));

        $setting->update([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'group' => $validated['group'],
            'data' => $data,
        ]);

        return redirect()->route('panel.settings.index')
            ->with('success', 'Setting updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiteSetting $setting)
    {
        $companyId = Auth::user()->company_id;

        // Verify ownership
        if ($setting->company_id != $companyId) {
            abort(403);
        }

        $setting->delete();

        return redirect()->route('panel.settings.index')
            ->with('success', 'Setting deleted successfully.');
    }

    /**
     * Process data based on type
     */
    private function processData($type, $value)
    {
        switch ($type) {
            case 'json':
                return is_array($value) ? $value : json_decode($value, true);
            case 'number':
                return is_numeric($value) ? (float)$value : 0;
            case 'image':
                // Handle image upload
                if ($value && $value->isValid()) {
                    $path = $value->store('settings', 'public');
                    return $path;
                }
                return $value;
            default:
                return $value;
        }
    }

    /**
     * Initialize default settings for a company
     */
    public static function initializeDefaultSettings($companyId)
    {
        $defaultSettings = [
            // General Settings
            ['name' => 'site_name', 'type' => 'text', 'group' => 'general', 'data' => 'My Company'],
            ['name' => 'site_description', 'type' => 'textarea', 'group' => 'general', 'data' => 'Company Description'],
            ['name' => 'site_logo', 'type' => 'image', 'group' => 'general', 'data' => null],
            ['name' => 'site_favicon', 'type' => 'image', 'group' => 'general', 'data' => null],

            // Contact Information
            ['name' => 'contact_address', 'type' => 'textarea', 'group' => 'contact', 'data' => ''],
            ['name' => 'contact_phone', 'type' => 'text', 'group' => 'contact', 'data' => ''],
            ['name' => 'contact_email', 'type' => 'email', 'group' => 'contact', 'data' => ''],
            ['name' => 'contact_whatsapp', 'type' => 'text', 'group' => 'contact', 'data' => ''],
            ['name' => 'contact_map', 'type' => 'textarea', 'group' => 'contact', 'data' => ''],

            // SEO Settings
            ['name' => 'meta_title', 'type' => 'text', 'group' => 'seo', 'data' => ''],
            ['name' => 'meta_description', 'type' => 'textarea', 'group' => 'seo', 'data' => ''],
            ['name' => 'meta_keywords', 'type' => 'text', 'group' => 'seo', 'data' => ''],
            ['name' => 'google_analytics', 'type' => 'text', 'group' => 'seo', 'data' => ''],
            ['name' => 'google_tag_manager', 'type' => 'text', 'group' => 'seo', 'data' => ''],

            // Social Media
            ['name' => 'social_facebook', 'type' => 'url', 'group' => 'social', 'data' => ''],
            ['name' => 'social_instagram', 'type' => 'url', 'group' => 'social', 'data' => ''],
            ['name' => 'social_twitter', 'type' => 'url', 'group' => 'social', 'data' => ''],
            ['name' => 'social_linkedin', 'type' => 'url', 'group' => 'social', 'data' => ''],
            ['name' => 'social_youtube', 'type' => 'url', 'group' => 'social', 'data' => ''],

            // Theme Settings
            ['name' => 'primary_color', 'type' => 'color', 'group' => 'theme', 'data' => '#007bff'],
            ['name' => 'secondary_color', 'type' => 'color', 'group' => 'theme', 'data' => '#6c757d'],
            ['name' => 'accent_color', 'type' => 'color', 'group' => 'theme', 'data' => '#28a745'],
            ['name' => 'header_background', 'type' => 'color', 'group' => 'theme', 'data' => '#ffffff'],
            ['name' => 'footer_background', 'type' => 'color', 'group' => 'theme', 'data' => '#343a40'],
        ];

        foreach ($defaultSettings as $setting) {
            SiteSetting::create([
                'company_id' => $companyId,
                'name' => $setting['name'],
                'type' => $setting['type'],
                'group' => $setting['group'],
                'data' => $setting['data'],
            ]);
        }
    }
}
