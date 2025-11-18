<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get first company or create one
        $company = \App\Models\Company::first();
        
        if (!$company) {
            $company = \App\Models\Company::create([
                'name' => 'Default Company',
                'slug' => 'default-company',
                'status' => '1',
            ]);
        }

        // Create admin user
        User::create([
            'company_id' => $company->id,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'is_admin' => 1,
            'status' => '1',
            'email_verified_at' => now(),
        ]);

        // Create regular user (optional)
        User::create([
            'company_id' => $company->id,
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => Hash::make('test123'),
            'is_admin' => 0,
            'status' => '1',
            'email_verified_at' => now(),
        ]);
    }
}

