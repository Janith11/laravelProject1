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
            'f_name'  => 'Janith',
            'm_name'  => 'Pramuditha',
            'l_name' => 'Silva',
            'email'   => 'janith@gmail.com',
            'password' => bcrypt('rootowner'),
            'nic_number' => '123456789',
            'gender' => 'male',
            'contact_number' => '0712447339',
            'dob' => '1996-5-31',
            'address_no' => 'A10',
            'address_lineone' => 'payagala',
            'address_linetwo' => 'kaluthara',
            'profile_img' => 'default_profile.jpg',
            'status' => '1',
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'f_name'  => 'Anushka',
            'm_name'  => 'Udana',
            'l_name' => 'Jayasinghe',
            'email'   => 'anushka@gmail.com',
            'password' => bcrypt('rootinstructor'),
            'nic_number' => '789123456',
            'gender' => 'male',
            'contact_number' => '0712447339',
            'dob' => '1996-5-31',
            'address_no' => 'B/11',
            'address_lineone' => 'keselwaththa',
            'address_linetwo' => 'monaragala',
            'profile_img' => 'default_profile.jpg',
            'status' => '1',
        ]);

        DB::table('users')->insert([
            'role_id' => '3',
            'f_name'  => 'Malesha',
            'm_name'  => 'Jayathilake',
            'l_name' => 'Mallawarachchi',
            'email'   => 'maleesha@gmail.com',
            'password' => bcrypt('rootstudent'),
            'nic_number' => '987456321',
            'gender' => 'female',
            'contact_number' => '0712447339',
            'dob' => '1996-5-31',
            'address_no' => '8/1',
            'address_lineone' => 'Araththana',
            'address_linetwo' => 'Mathugama',
            'profile_img' => 'default_profile.jpg',
            'status' => '1',
        ]);
    }
}
