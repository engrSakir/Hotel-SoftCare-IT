<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'Mr. Admin';
        $user->phone = '01304734623';
        $user->password = Hash::make('password');
        $user->save();

        $user = new \App\User();
        $user->name = 'Mr. Admin';
        $user->phone = '01304734624';
        $user->password = Hash::make('password');
        $user->save();
    }
}
