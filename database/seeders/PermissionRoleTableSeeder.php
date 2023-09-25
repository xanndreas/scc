<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        // users
        Role::findOrFail(2)->permissions()->sync([]);

        // suppliers
        Role::findOrFail(3)->permissions()->sync([]);
    }
}
