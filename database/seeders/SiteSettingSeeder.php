<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::create([
            'name' => 'adres',
            'data' => 'adrea'
        ]);

        SiteSetting::create([
            'name' => 'phone',
            'data' => '545'
        ]);

        SiteSetting::create([
            'name' => 'email',
            'data' => 'eposta'
        ]);

        SiteSetting::create([
            'name' => 'harita',
            'data' => 'link'
        ]);
    }
}
