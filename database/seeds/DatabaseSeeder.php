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
        DB::table('posts')->insert([
            'title' => 'A simple test',
            'content' => 'A simple body',
        ]);

        DB::table('users')->insert([
            'name'=> 'Admin',
            'role_id'=> 1,
            'email'=> 'admin@sovtech.com',
            'password'=> bcrypt('secret')

        ]);

        DB::table('roles')->insert([
            'name'=> 'administrator',
        ]);

   
    }
}
