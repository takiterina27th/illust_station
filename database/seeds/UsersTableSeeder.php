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
        DB::table('users')->insert([
            [
                'name' => 'testuser',
                'email' => 'testuser@example.com',
                'password' => Hash::make('testuser0123'),
            ],[
                'name' => 'testuser2',
                'email' => 'testuser2@example.com',
                'password' => Hash::make('testuser4567'),
            ]
        ]);
    }
}
