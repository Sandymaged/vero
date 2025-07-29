<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!\DB::table('users')->count()) {
            \DB::table('users')->insert([
                'id' => 1,
                'name' => 'Michael E. Quinn',
                'email' => 'admin@admin.com',
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
