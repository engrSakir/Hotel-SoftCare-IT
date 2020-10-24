<?php

use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = new \App\ServiceCategory();
        $cat->name = 'Room';
        $cat->save();

        $cat = new \App\ServiceCategory();
        $cat->name = 'Pool';
        $cat->save();

        $cat = new \App\ServiceCategory();
        $cat->name = 'Spa';
        $cat->save();
    }
}
