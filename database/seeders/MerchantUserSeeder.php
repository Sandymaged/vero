<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MerchantUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!\DB::table('merchant_users')->count()) {
            \DB::table('merchant_users')->insert([
                'id' => 1,
                'name' => 'Michael E. Quinn',
                'merchant_id' => 1,
                'merchant_branch_id' => null,
                'email' => 'user@lina.com',
                'password' => bcrypt(12345678),
                'remember_token' => \Str::random(10),
                'is_active' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
