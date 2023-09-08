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
        Customer::create([
            'first_name' => 'görkem',
            'last_name' => 'sandıkcı',
            'gender' => 'male',
            'city_id' => 'istanbuk',
            'district_id' => 'kartal',
            'address' => 'üsküdar cd orhantepe mh no: 167',
            'special_notes' => 'yazılımcı',
            'status' => '1',
            'email' => 'gorkem@gorkemnet.com',
            'phone' => '05458918905',
        ]);
    }
}
