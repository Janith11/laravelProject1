<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // set owner demo data
        DB::table('roles')->insert([
            'name' => 'Owner',
            'slug' => 'owner'
        ]);
        
        // set insstructor demo data
        DB::table('roles')->insert([
            'name' => 'Instructor',
            'slug' => 'instructor'
        ]);
        
        // set student demo data
        DB::table('roles')->insert([
            'name' => 'Student',
            'slug' => 'student'
        ]);
    }
}
