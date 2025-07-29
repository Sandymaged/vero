<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!\DB::table('merchants')->count()) {
            \DB::table('merchants')->insert([
                'id' => 1,
                'name' => 'Lina Center',
                'state_id' => 1,
                'deposit_percentage' => 20,
                'type' => 1, // 1 for center, 2 for home
                'logo' => 'def.png',
                'image' => 'def.png',
                'video_url' => 'https://www.youtube.com/',
                'location' => \DB::raw("ST_GeomFromText('POINT(24.751124 46.746966)')"),
                'admin_name' => 'Ali Ahmed',
                'reservations_responsible_name' => 'Omar Soliman',
                'admin_phone' => '011111111111',
                'reservations_responsible_phone' => '011111111111',
                'email' => 'merchant_branch@lina.com',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
