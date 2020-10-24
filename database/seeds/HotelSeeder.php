<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotels')->insert([
            //1 room
            [
                'location_id' => '1',
                'name' => 'Hotel -1',
            ],[
                'location_id' => '2',
                'name' => 'Hotel -2',
            ],[
                'location_id' => '3',
                'name' => 'Hotel -3',
            ],[
                'location_id' => '4',
                'name' => 'Hotel -4',
            ],[
                'location_id' => '5',
                'name' => 'Hotel -5',
            ]
        ]);
    }
}
