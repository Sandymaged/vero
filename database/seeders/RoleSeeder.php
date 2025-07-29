<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!\DB::table('roles')->count()) {
            \DB::table('roles')->insert([
                'id' => 1,
                'name' => 'Superadmin',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            if (!\DB::table('role_has_permissions')->count()) {
                $permissions = \DB::table('permissions')->get();
                foreach ($permissions as $permission) {
                    \DB::table('role_has_permissions')->insert([
                        'permission_id' => $permission->id,
                        'role_id' => 1,
                    ]);
                }
            }
        }
    }
}
