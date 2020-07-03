<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'zufar',
            'email' => 'zufarhandito'.'@gmail.com',
            'password' => Hash::make('ngentot'),

        ]);
    }
}
