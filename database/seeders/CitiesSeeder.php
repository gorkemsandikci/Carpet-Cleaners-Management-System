<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->delete();

        $cities = array(
            array('name' => "İstanbul", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "İzmir", 'created_at' => now(), 'updated_at' => now()),
        );

        DB::table('cities')->insert($cities);
    }
}
