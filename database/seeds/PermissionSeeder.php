<?php

use App\Models\Permission;
use App\Models\Role;
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
        // add role
        $owner = Role::create([
            'name' => 'owner',
            'display_name' => 'Project Owner', // optional
            'description' => 'User is the owner of a given project', // optional
        ]);
        
        $permissions = [];
        $permissions[] = Permission::create(['name' => 'view-setting', 'display_name' => 'View Setting', 'description' => '']);
        $permissions[] = Permission::create(['name' => 'update-setting', 'display_name' => 'Update Setting', 'description' => '']);

        $permissions[] = Permission::create(['name' => 'view-admins', 'display_name' => 'Update Setting', 'description' => '']);
        $permissions[] = Permission::create(['name' => 'add-admins', 'display_name' => 'Update Setting', 'description' => '']);
        $permissions[] = Permission::create(['name' => 'edit-admins', 'display_name' => 'Update Setting', 'description' => '']);
        $permissions[] = Permission::create(['name' => 'delete-admins', 'display_name' => 'Update Setting', 'description' => '']);

        $permissions[] = Permission::create(['name' => 'view-roles', 'display_name' => 'Update Setting', 'description' => '']);
        $permissions[] = Permission::create(['name' => 'add-roles', 'display_name' => 'Update Setting', 'description' => '']);
        $permissions[] = Permission::create(['name' => 'edit-roles', 'display_name' => 'Update Setting', 'description' => '']);
        $permissions[] = Permission::create(['name' => 'delete-roles', 'display_name' => 'Update Setting', 'description' => '']);


        $owner->attachPermissions($permissions);
    }
}
