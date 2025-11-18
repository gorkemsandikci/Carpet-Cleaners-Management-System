<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            CompanySeeder::class,
            UserSeeder::class,
            SiteSettingSeeder::class,
            HomepageContentSeeder::class,
            GallerySeeder::class,
            CustomerSeeder::class,
            CitiesSeeder::class,
            DistrictsSeeder::class,
            ServiceSeeder::class,
            AboutsSeeder::class
        ]);

    }
}
