<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();

        $admin_permissions = $permissions->filter(function ($permission) {
            return $permission->title != 'user_access';
        });
        Role::findOrFail(1)->permissions()->sync($admin_permissions);

        $user_permissions = $permissions->filter(function ($permission) {
            return $permission->title != 'admin_access';
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);
    }
}
