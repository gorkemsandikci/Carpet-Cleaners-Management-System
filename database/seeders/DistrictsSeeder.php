<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('districts')->delete();

        $istanbul_districts = array(
            array('name' => "Adalar", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Arnavutköy", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Ataşehir", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Avcılar", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Bağcılar", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Bahçelievler", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Bakırköy", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Başakşehir", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Bayrampaşa", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Beşiktaş", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Beykoz", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Beylikdüzü", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Beyoğlu", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Büyükçekmece", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Çatalca", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Çekmeköy", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Esenler", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Esenyurt", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Eyüp", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Fatih", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Gaziosmanpaşa", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Güngören", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Kadıköy", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Kağıthane", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Kartal", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Küçükçekmece", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Maltepe", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Pendik", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Sancaktepe", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Sarıyer", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Şile", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Silivri", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Şişli", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Sultanbeyli", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Sultangazi", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Tuzla", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Ümraniye", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Üsküdar", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
            array('name' =>  "Zeytinburnu", 'city_id' => "1", 'created_at' => now(), 'updated_at' => now()),
        );

        DB::table('districts')->insert($istanbul_districts);

        $izmir_districts = array(
            array('name' => "Aliağa", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Balçova", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Bayındır", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Bayraklı", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Bergama", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Beydağ", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Bornova", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Buca", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Çeşme", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Çiğli", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Dikili", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Foça", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Gaziemir", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Güzelbahçe", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Karabağlar", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Karaburun", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Karşıyaka", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Kemalpaşa", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Kınık", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Kiraz", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Konak", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Menderes", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Menemen", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Narlıdere", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Ödemiş", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Seferihisar", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Selçuk", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Tire", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Torbalı", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now()),
            array('name' => "Urla", 'city_id' => "2", 'created_at' => now(), 'updated_at' => now())
        );

        DB::table('districts')->insert($izmir_districts);
    }
}
