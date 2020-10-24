<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            //1 room
            [
                'name' => 'Dhaka',
            ],[
                'name' => 'Cox',
            ],[
                'name' => 'Khulna',
            ],[
                'name' => 'Ctg',
            ],[
                'name' => 'Kolkata',
            ]
        ]);
    }
}
