<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!\DB::table('cities')->count()) {
            \DB::table('cities')->insert([
                'id' => 1,
                'name' => 'حي المصانع',
                'state_id' => 1,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
