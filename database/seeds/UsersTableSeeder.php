<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'wotty',
            'email' => 'wotty@test.com',
            'password' => bcrypt('test12'),
        ]);
    }
}
