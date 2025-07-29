<?php

namespace Database\Seeders;

use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!\DB::table('offers')->count()) {
            \DB::table('offers')->insert([
                'id' => 1,
                'name' => 'عرض شهري',
                'merchant_id' => 1,
                'merchant_branch_id' => 1,
                'category_id' => 1,
                'subcategory_id' => 2,
                'service_id' => 3,
                'price' => 120,
                'application_percentage' => 12,
                'extra_details' => 'معلومات',
                'notes' => 'معلومات',
                'type' => 1,
                'image' => 'def.png',
                'video_url' => 'https://www.youtube.com/',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
