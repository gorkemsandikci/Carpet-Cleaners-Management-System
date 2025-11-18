<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = \App\Models\Company::first();
        if (!$company) {
            return;
        }

        Customer::create([
            'company_id' => $company->id,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'gender' => 'male',
            'city_id' => 'istanbul',
            'district_id' => 'kadikoy',
            'address' => 'Sample Address',
            'special_notes' => 'Sample customer',
            'status' => '1',
            'email' => 'customer@example.com',
            'phone' => '+90 XXX XXX XX XX',
        ]);
    }
}
