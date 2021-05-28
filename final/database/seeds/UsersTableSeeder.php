<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'role_id' => '1',
            'name'    => 'Owner',
            'username'=> 'janith',
            'email'   => 'janith@gmail.com',
            'password'=> bcrypt('rootowner')
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name'    => 'Instructor',
            'username'=> 'poriya',
            'email'   => 'poriya@gmail.com',
            'password'=> bcrypt('rootinstructor')
        ]);

        DB::table('users')->insert([
            'role_id' => '3',
            'name'    => 'Student',
            'username'=> 'maleesha',
            'email'   => 'maleesha@gmail.com',
            'password'=> bcrypt('rootstudent')
        ]);
    }
}
