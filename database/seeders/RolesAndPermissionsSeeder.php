<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Roles
        $roles = ['super-admin','admin','volunteer','donor','guest'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Example permissions - extend as needed
        $perms = ['manage children','manage campaigns','manage donations','manage users'];
        foreach ($perms as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Assign all permissions to super-admin
        $superAdmin = Role::where('name','super-admin')->first();
        if ($superAdmin) {
            $superAdmin->givePermissionTo(Permission::all());
        }
    }
}
