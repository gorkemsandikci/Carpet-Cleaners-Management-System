<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Http\Controllers\Backend\SiteSettingController;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default company
        $company = Company::create([
            'name' => 'Default Company',
            'slug' => 'default-company',
            'domain' => null,
            'email' => 'info@example.com',
            'phone' => '+90 555 123 4567',
            'address' => 'Istanbul, Turkey',
            'status' => '1',
        ]);

        // Initialize default settings for the company
        SiteSettingController::initializeDefaultSettings($company->id);
    }
}
