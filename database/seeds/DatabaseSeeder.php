<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(SettingSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(RoleSeeder::class);

         $this->call(PermissionSeeder::class);

        $this->call(ServiceCategorySeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(HotelSeeder::class);
        $this->call(BlogSeeder::class);
    }
}
