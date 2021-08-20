<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // id 1 owner
        DB::table('users')->insert([
            'role_id' => '1',
            'f_name'  => 'Janith',
            'm_name'  => 'Pramuditha',
            'l_name' => 'Silva',
            'email'   => 'janith@gmail.com',
            'password' => Hash::make('rootowner'),
            'nic_number' => '123456789',
            'gender' => 'male',
            'contact_number' => '0712447339',
            'dob' => '1996-5-31',
            'address_no' => 'A10',
            'address_lineone' => 'payagala',
            'address_linetwo' => 'kaluthara',
            'profile_img' => 'default_profile.jpg',
            'status' => '1',
            'created_at' => '2021-06-20 14:18:56'
        ]);
        // id 2 instructor 1
        DB::table('users')->insert([
            'role_id' => '2',
            'f_name'  => 'Anushka',
            'm_name'  => 'Udana',
            'l_name' => 'Jayasinghe',
            'email'   => 'anushka@gmail.com',
            'password' => Hash::make('rootinstructor'),
            'nic_number' => '789123456',
            'gender' => 'male',
            'contact_number' => '0712447339',
            'dob' => '1996-5-31',
            'address_no' => 'B/11',
            'address_lineone' => 'keselwaththa',
            'address_linetwo' => 'monaragala',
            'profile_img' => 'default_profile.jpg',
            'status' => '1',
            'created_at' => '2021-06-22 14:18:56'
        ]);
         // id 3 instructor 2
         DB::table('users')->insert([
            'role_id' => '2',
            'f_name'  => 'Yasitha',
            'm_name'  => 'Kasthuri',
            'l_name' => 'Fernando',
            'email'   => 'yasithak@gmail.com',
            'password' => Hash::make('rootinstructor'),
            'nic_number' => '963265425',
            'gender' => 'male',
            'contact_number' => '0726958742',
            'dob' => '1996-8-31',
            'address_no' => '12/2',
            'address_lineone' => 'Kesbewa Road',
            'address_linetwo' => 'Piliyandala',
            'profile_img' => 'default_profile.jpg',
            'status' => '1',
            'created_at' => '2021-06-22 14:18:56'
        ]);
        // id 4 instructor 3
        DB::table('users')->insert([
            'role_id' => '2',
            'f_name'  => 'Dulaj',
            'm_name'  => 'Jayathissa',
            'l_name' => 'Waduge',
            'email'   => 'dulajwadu@gmail.com',
            'password' => Hash::make('rootinstructor'),
            'nic_number' => '942569854',
            'gender' => 'male',
            'contact_number' => '0776325942',
            'dob' => '1994-4-28',
            'address_no' => '12/1',
            'address_lineone' => 'Maligawatta Road',
            'address_linetwo' => 'Colombo 10',
            'profile_img' => 'default_profile.jpg',
            'status' => '1',
            'created_at' => '2021-06-22 14:18:56'
        ]);
        // id 5 instructor 4
        DB::table('users')->insert([
            'role_id' => '3',
            'f_name'  => 'Udeshya',
            'm_name'  => 'Indunil',
            'l_name' => 'Kalindu',
            'email'   => 'udeshya@gmail.com',
            'password' => Hash::make('rootstudent'),
            'nic_number' => '992514785',
            'gender' => 'male',
            'contact_number' => '0762541478',
            'dob' => '1996-5-31',
            'address_no' => '10G',
            'address_lineone' => 'Pokunuwita Road',
            'address_linetwo' => 'Aluthgama',
            'profile_img' => 'default_profile.jpg',
            'status' => '1',
            'created_at' => '2021-06-22 14:18:56'
        ]);
        // id 6 student 1
        DB::table('users')->insert([
            'role_id' => '3',
            'f_name'  => 'Malesha',
            'm_name'  => 'Jayathilake',
            'l_name' => 'Mallawarachchi',
            'email'   => 'maleesha@gmail.com',
            'password' => Hash::make('rootstudent'),
            'nic_number' => '987456321',
            'gender' => 'female',
            'contact_number' => '0712447339',
            'dob' => '1996-5-31',
            'address_no' => '8/1',
            'address_lineone' => 'Araththana',
            'address_linetwo' => 'Mathugama',
            'profile_img' => 'default_profile.jpg',
            'status' => '1',
            'created_at' => '2021-06-23 14:18:56'
        ]);


        // id 7 student 2
        DB::table('users')->insert([
            'role_id' => '3',
            'f_name'  => 'Nimesha',
            'm_name'  => 'Sathsara',
            'l_name' => 'Perera',
            'email'   => 'nimesha@gmail.com',
            'password' => Hash::make('rootstudent'),
            'nic_number' => '923625478',
            'gender' => 'male',
            'contact_number' => '0721258742',
            'dob' => '1992-9-3',
            'address_no' => '58/3',
            'address_lineone' => 'Galewela Road',
            'address_linetwo' => 'wadduwa',
            'profile_img' => 'default_profile.jpg',
            'status' => '1',
            'created_at' => '2021-06-23 14:18:56'
        ]);
        // id 8 student 3
        DB::table('users')->insert([
            'role_id' => '3',
            'f_name'  => 'Niroshan',
            'm_name'  => 'Dickwella',
            'l_name' => 'Silva',
            'email'   => 'niroshan@gmail.com',
            'password' => Hash::make('rootstudent'),
            'nic_number' => '902545876',
            'gender' => 'male',
            'contact_number' => '0706587512',
            'dob' => '1990-2-20',
            'address_no' => '90/5',
            'address_lineone' => 'Mahawihara Road',
            'address_linetwo' => 'Waskaduwa',
            'profile_img' => 'default_profile.jpg',
            'status' => '1',
            'created_at' => '2021-06-25 14:18:56'
        ]);
        // id 9 student 4
        DB::table('users')->insert([
            'role_id' => '3',
            'f_name'  => 'Kavindu',
            'm_name'  => 'Sankalpa',
            'l_name' => 'Weerasooriya',
            'email'   => 'kavindu@gmail.com',
            'password' => Hash::make('rootstudent'),
            'nic_number' => '892545698',
            'gender' => 'male',
            'contact_number' => '0726548354',
            'dob' => '1989-7-25',
            'address_no' => '25/7',
            'address_lineone' => 'Wasantharama Road',
            'address_linetwo' => 'Wadduwa',
            'profile_img' => 'default_profile.jpg',
            'status' => '1',
            'created_at' => '2021-06-27 14:18:56'
        ]);
        // id 10 student 5
        DB::table('users')->insert([
            'role_id' => '3',
            'f_name'  => 'Nipun',
            'm_name'  => 'Tharaka',
            'l_name' => 'Fonseka',
            'email'   => 'nipun@gmail.com',
            'password' => Hash::make('rootstudent'),
            'nic_number' => '982549875',
            'gender' => 'male',
            'contact_number' => '0779687777',
            'dob' => '1998-8-8',
            'address_no' => 'Nipun Fonseka',
            'address_lineone' => 'Oruthota Road',
            'address_linetwo' => 'Kalawewa',
            'profile_img' => 'default_profile.jpg',
            'status' => '1',
            'created_at' => '2021-06-28 14:18:56'
        ]);
        // id 11 candidate 1
        DB::table('users')->insert([
            'role_id' => '4',
            'f_name'  => 'Kamal',
            'm_name'  => 'Chamara',
            'l_name' => 'Addaraarachchi',
            'email'   => 'kamal@gmail.com',
            'password' => Hash::make('rootcandidate'),
            'nic_number' => '987654321',
            'gender' => 'female',
            'contact_number' => '0712447338',
            'dob' => '1990-5-31',
            'address_no' => 'A16',
            'address_lineone' => 'Amaya Road',
            'address_linetwo' => 'Piliyandala',
            'profile_img' => 'default_profile.jpg',
            'status' => '1',
            'created_at' => '2021-07-01 14:18:56'
        ]);
        // id 12 candidate 2
        DB::table('users')->insert([
            'role_id' => '4',
            'f_name'  => 'Chamal',
            'm_name'  => 'Iddamalgoda',
            'l_name' => 'Rajapakse',
            'email'   => 'chamal@gmail.com',
            'password' => Hash::make('rootcandidate'),
            'nic_number' => '936548252',
            'gender' => 'male',
            'contact_number' => '0716458523',
            'dob' => '1993-1-1',
            'address_no' => 'Old Road',
            'address_lineone' => 'Gorakana',
            'address_linetwo' => 'Moratuwa',
            'profile_img' => 'default_profile.jpg',
            'status' => '1',
            'created_at' => '2021-07-05 14:18:56'
        ]);
        // id 13 candidate 3
        DB::table('users')->insert([
            'role_id' => '4',
            'f_name'  => 'Asoka',
            'm_name'  => 'Withanage',
            'l_name' => 'Peiris',
            'email'   => 'asoka@gmail.com',
            'password' => Hash::make('rootcandidate'),
            'nic_number' => '603648524',
            'gender' => 'male',
            'contact_number' => '07796664521',
            'dob' => '1960-3-15',
            'address_no' => '25/2',
            'address_lineone' => 'Kesbewa Road',
            'address_linetwo' => 'Bandaragama',
            'profile_img' => 'default_profile.jpg',
            'status' => '1',
            'created_at' => '2021-07-05 14:18:56'
        ]);
        // id 14 candidate 4
        DB::table('users')->insert([
            'role_id' => '4',
            'f_name'  => 'Sujeewa',
            'm_name'  => 'Sandadiya',
            'l_name' => 'Perera',
            'email'   => 'sujeewa@gmail.com',
            'password' => Hash::make('rootcandidate'),
            'nic_number' => '705415785',
            'gender' => 'male',
            'contact_number' => '0716644558',
            'dob' => '1970-6-19',
            'address_no' => 'Sarana',
            'address_lineone' => 'Nanduwa Road',
            'address_linetwo' => 'Moronthuduwa',
            'profile_img' => 'default_profile.jpg',
            'status' => '0',
            'created_at' => '2021-07-10 14:18:56'
        ]);
    }
}
