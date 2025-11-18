<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $company = Company::first();
        if (!$company) {
            return;
        }

        $settings = [
            // General Settings
            ['name' => 'site_name', 'type' => 'text', 'group' => 'general', 'data' => 'Your Company Name'],
            ['name' => 'site_description', 'type' => 'textarea', 'group' => 'general', 'data' => 'Professional service provider'],
            ['name' => 'site_keywords', 'type' => 'text', 'group' => 'general', 'data' => 'service, professional'],
            
            // Contact Settings
            ['name' => 'phone', 'type' => 'text', 'group' => 'contact', 'data' => '+90 XXX XXX XX XX'],
            ['name' => 'email', 'type' => 'email', 'group' => 'contact', 'data' => 'info@example.com'],
            ['name' => 'address', 'type' => 'textarea', 'group' => 'contact', 'data' => 'Your Company Address'],
            ['name' => 'whatsapp', 'type' => 'text', 'group' => 'contact', 'data' => '+90 XXX XXX XX XX'],
            
            // Social Media
            ['name' => 'facebook_url', 'type' => 'url', 'group' => 'social', 'data' => ''],
            ['name' => 'instagram_url', 'type' => 'url', 'group' => 'social', 'data' => ''],
            ['name' => 'youtube_url', 'type' => 'url', 'group' => 'social', 'data' => ''],
            ['name' => 'twitter_url', 'type' => 'url', 'group' => 'social', 'data' => ''],
            
            // Appearance - Main Colors
            ['name' => 'logo', 'type' => 'image', 'group' => 'appearance', 'data' => ''],
            ['name' => 'favicon', 'type' => 'image', 'group' => 'appearance', 'data' => ''],
            
            // Main Colors
            ['name' => 'primary_color', 'type' => 'color', 'group' => 'colors_main', 'data' => '#007bff'],
            ['name' => 'secondary_color', 'type' => 'color', 'group' => 'colors_main', 'data' => '#6c757d'],
            ['name' => 'accent_color', 'type' => 'color', 'group' => 'colors_main', 'data' => '#28a745'],
            ['name' => 'text_primary', 'type' => 'color', 'group' => 'colors_main', 'data' => '#212529'],
            ['name' => 'text_secondary', 'type' => 'color', 'group' => 'colors_main', 'data' => '#6c757d'],
            
            // Alternative Colors
            ['name' => 'success_color', 'type' => 'color', 'group' => 'colors_alternative', 'data' => '#28a745'],
            ['name' => 'warning_color', 'type' => 'color', 'group' => 'colors_alternative', 'data' => '#ffc107'],
            ['name' => 'danger_color', 'type' => 'color', 'group' => 'colors_alternative', 'data' => '#dc3545'],
            ['name' => 'info_color', 'type' => 'color', 'group' => 'colors_alternative', 'data' => '#17a2b8'],
            
            // Shadow Colors
            ['name' => 'shadow_color', 'type' => 'color', 'group' => 'colors_shadow', 'data' => '#000000'],
            ['name' => 'shadow_opacity', 'type' => 'text', 'group' => 'colors_shadow', 'data' => '0.15'],
            
            // Button Colors
            ['name' => 'button_primary', 'type' => 'color', 'group' => 'colors_button', 'data' => '#007bff'],
            ['name' => 'button_primary_hover', 'type' => 'color', 'group' => 'colors_button', 'data' => '#0056b3'],
            ['name' => 'button_secondary', 'type' => 'color', 'group' => 'colors_button', 'data' => '#6c757d'],
            ['name' => 'button_text', 'type' => 'color', 'group' => 'colors_button', 'data' => '#ffffff'],
            
            // Background Colors
            ['name' => 'header_background', 'type' => 'color', 'group' => 'colors_background', 'data' => '#ffffff'],
            ['name' => 'footer_background', 'type' => 'color', 'group' => 'colors_background', 'data' => '#343a40'],
            ['name' => 'body_background', 'type' => 'color', 'group' => 'colors_background', 'data' => '#ffffff'],
            ['name' => 'section_background', 'type' => 'color', 'group' => 'colors_background', 'data' => '#f8f9fa'],
            
            // Footer
            ['name' => 'footer_text', 'type' => 'textarea', 'group' => 'footer', 'data' => 'Your company description for footer'],
            ['name' => 'copyright_text', 'type' => 'text', 'group' => 'footer', 'data' => 'Copyright © ' . date('Y') . ' Your Company Name | All rights reserved.'],
            
            // Call to Action
            ['name' => 'cta_button_text', 'type' => 'text', 'group' => 'general', 'data' => 'Randevu Al'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                [
                    'company_id' => $company->id,
                    'name' => $setting['name'],
                ],
                [
                    'type' => $setting['type'],
                    'group' => $setting['group'],
                    'data' => $setting['data'],
                ]
            );
        }
    }
}
