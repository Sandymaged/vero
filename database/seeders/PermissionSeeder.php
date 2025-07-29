<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $models = [
            'admins', 'states', 'cities', 'categories', 'offers', 'merchants', 'merchant_users', 'merchant_branches'
        ];

        $permissions = ['create', 'delete', 'update', 'view'];

        if (!\DB::table('permissions')->count()) {
            $id = 1;
            foreach ($models as $model) {
                foreach ($permissions as $permission) {
                    \DB::table('permissions')->insert([
                        'id' => $id++,
                        'name' => $model . '.' . $permission,
                        'guard_name' => 'web',
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }
        }
    }
}
