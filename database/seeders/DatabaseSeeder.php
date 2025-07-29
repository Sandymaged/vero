<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            MerchantSeeder::class,
            MerchantBranchSeeder::class,
            MerchantUserSeeder::class,
            MerchantCitySeeder::class,
            CategorySeeder::class,
            OfferSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
