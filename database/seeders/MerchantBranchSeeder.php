<?php

namespace Database\Seeders;

use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Database\Seeder;

class MerchantBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!\DB::table('merchant_branches')->count()) {
            \DB::table('merchant_branches')->insert([
                'id' => 1,
                'name' => 'Lina Center Branch',
                'merchant_id' => 1,
                'state_id' => 1,
                'image' => 'def.png',
                'location' => \DB::raw("ST_GeomFromText('POINT(24.751124 46.746966)')"),
                'responsible_name' => 'Omar Soliman',
                'responsible_phone' => '011111111111',
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
