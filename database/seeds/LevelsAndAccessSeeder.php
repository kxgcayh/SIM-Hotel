<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class LevelsAndAccessSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Access
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'read']);
        Permission::create(['name' => 'update']);
        Permission::create(['name' => 'delete']);

        // Create Admin Level
        $adminRole = Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all());

        // Create Staff Level
        $staffRole = Role::create(['name' => 'staff'])
            ->givePermissionTo([
                'read', 'update', 'delete'
            ]);

        // Create User Level
        $userRole = Role::create(['name' => 'user'])
            ->givePermissionTo([
                'create', 'read', 'update'
            ]);
        
        // Assign Admin Level to User
        $admin = User::find(1);
        $admin->assignRole([$adminRole->id]);

        // Assign Staff Level to User
        $staff = User::find(2);
        $staff->assignRole([$staffRole->id]);

        // Assign User Level to User
        $user = User::find(3);
        $user->assignRole([$userRole->id]);
    }
}
