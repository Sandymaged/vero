<?php

namespace Database\Seeders;

use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!\DB::table('categories')->count()) {
            // Category
            \DB::table('categories')->insert([
                'id' => 1,
                'name' => 'فئة',
                'parent_id' => null,
                'state_id' => 1,
                'is_service' => 0,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            // Subategory
            \DB::table('categories')->insert([
                'id' => 2,
                'name' => 'فئة',
                'parent_id' => 1,
                'state_id' => 1,
                'is_service' => 0,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            // Service
            \DB::table('categories')->insert([
                'id' => 3,
                'name' => 'فئة',
                'parent_id' => 2,
                'state_id' => 1,
                'is_service' => 1,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
