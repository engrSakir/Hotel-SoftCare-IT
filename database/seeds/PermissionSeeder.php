<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developer = Role::find(1);
        $admin= Role::find(2);
        $hotel_owner= Role::find(3);

        //setting
        $permission = Permission::create(['name' => 'manage-setting']); //Setting change or update
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);

        //manage-advance-ownership
        $permission = Permission::create(['name' => 'manage-advance-ownership']); //advance-ownership active or deactivate for this system
        $developer->givePermissionTo($permission);
        //$admin->givePermissionTo($permission);

        //dashboard
        $permission = Permission::create(['name' => 'view-dashboard']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);
        $hotel_owner->givePermissionTo($permission);

        //designation
        $permission = Permission::create(['name' => 'view-designation']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'add-designation']);
        $developer->givePermissionTo($permission);
        //$admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'edit-designation']);
        $developer->givePermissionTo($permission);
        //$admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'delete-designation']);
        $developer->givePermissionTo($permission);
        //$admin->givePermissionTo($permission);

        //location
        $permission = Permission::create(['name' => 'view-location']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'add-location']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'edit-location']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'delete-location']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);

        //blog
        $permission = Permission::create(['name' => 'view-blog']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'add-blog']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'edit-blog']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'delete-blog']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);

        //manage-frontend
        $permission = Permission::create(['name' => 'manage-frontend']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);

        //hotel
        $permission = Permission::create(['name' => 'view-hotel']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'add-hotel']);
        $developer->givePermissionTo($permission);
        //$admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'edit-hotel']);
        $developer->givePermissionTo($permission);
        //$admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'delete-hotel']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'approval-hotel']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);


        //user
        $permission = Permission::create(['name' => 'view-user']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'add-user']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'edit-user']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'delete-user']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);

        //ServiceCategory Room|Spa|Pool
        $permission = Permission::create(['name' => 'view-service-category']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'add-service-category']);
        $developer->givePermissionTo($permission);
        //$admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'edit-service-category']);
        $developer->givePermissionTo($permission);
        //$admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'delete-service-category']);
        $developer->givePermissionTo($permission);
        //$admin->givePermissionTo($permission);

        //Service Room>-Single|Double|Triple
        $permission = Permission::create(['name' => 'view-service']);
        $developer->givePermissionTo($permission);
        $admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'add-service']);
        $developer->givePermissionTo($permission);
        //$admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'edit-service']);
        $developer->givePermissionTo($permission);
        //$admin->givePermissionTo($permission);
        $permission = Permission::create(['name' => 'delete-service']);
        $developer->givePermissionTo($permission);
        //$admin->givePermissionTo($permission);

        //My view-my-hotels
        $permission = Permission::create(['name' => 'view-my-hotel']);
        $developer->givePermissionTo($permission);
        //$admin->givePermissionTo($permission);
        $hotel_owner->givePermissionTo($permission);

        //My edit-my-hotel-images
        $permission = Permission::create(['name' => 'edit-my-hotel']);
        $developer->givePermissionTo($permission);
        //$admin->givePermissionTo($permission);
        $hotel_owner->givePermissionTo($permission);

    }
}
