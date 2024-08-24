<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laratrust\Models\Role;
use Laratrust\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            'add-product',
            'edit-product',
            'show-product',
            'delete-product',
            'assign-roles'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        $superAdmin = Role::create([
            'name' => 'super-admin',
            'display_name' => 'Super Administrator',
            'description' => 'User is a super admin and can manage everything',
        ]);
        $superAdmin->syncPermissions(Permission::all()); // Use syncPermissions instead of attachPermissions

        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'User can manage products',
        ]);
        $admin->syncPermissions([
            Permission::where('name', 'add-product')->first(),
            Permission::where('name', 'edit-product')->first(),
            Permission::where('name', 'show-product')->first(),
            Permission::where('name', 'delete-product')->first(),
        ]);

        $customer = Role::create([
            'name' => 'customer',
            'display_name' => 'Customer',
            'description' => 'User can only view products',
        ]);
        $customer->syncPermissions([
            Permission::where('name', 'show-product')->first(),
        ]);
    }
}
