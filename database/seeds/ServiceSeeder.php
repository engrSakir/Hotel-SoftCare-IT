<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            //1 room
            [
                'category_id' => '1',
                'name' => 'Single',
            ],[
                'category_id' => '1',
                'name' => 'Double',
            ],[
                'category_id' => '1',
                'name' => 'Triple',
            ],[
                'category_id' => '1',
                'name' => 'Quad',
            ],[
                'category_id' => '1',
                'name' => 'Queen',
            ],[
                'category_id' => '1',
                'name' => 'King',
            ],[
                'category_id' => '1',
                'name' => 'Master-Suite',
            ],[
                'category_id' => '1',
                'name' => 'Connecting rooms',
            ],
            //2 Pool
            [
                'category_id' => '2',
                'name' => 'Private Swimming Pool',
            ],[
                'category_id' => '2',
                'name' => 'Commercial Swimming Pool',
            ],[
                'category_id' => '2',
                'name' => 'Recreational Swimming Pool',
            ],[
                'category_id' => '2',
                'name' => 'Skimmer Type Swimming Pool',
            ],
            //3 number Spa
            [
                'category_id' => '3',
                'name' => 'Bootcamp spa',
            ],[
                'category_id' => '3',
                'name' => 'Club spa',
            ],[
                'category_id' => '3',
                'name' => 'Day spa',
            ],[
                'category_id' => '3',
                'name' => 'Dental spa',
            ],[
                'category_id' => '3',
                'name' => 'Hammam spa',
            ],
        ]);
    }
}
