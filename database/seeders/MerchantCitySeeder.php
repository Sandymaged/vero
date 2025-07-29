<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MerchantCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!\DB::table('merchant_cities')->count()) {
            \DB::table('merchant_cities')->insert([
                'id' => 1,
                'merchant_id' => 1,
                'city_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
