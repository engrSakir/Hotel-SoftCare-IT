<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1. developer 2. admin 3. hotel-owner 4. customer
        Role::create(['name' => 'developer']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'hotel-owner']);
        Role::create(['name' => 'customer']);

        \App\User::where('phone', '01304734623')->first()->assignRole('developer');
        \App\User::where('phone', '01304734624')->first()->assignRole('admin');
    }
}
