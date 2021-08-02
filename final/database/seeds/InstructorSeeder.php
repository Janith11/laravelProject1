<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instructors')->insert([
            'user_id' => '2',  
        ]);
        DB::table('instructors')->insert([
            'user_id' => '3',  
        ]);
        DB::table('instructors')->insert([
            'user_id' => '4',  
        ]);
        DB::table('instructors')->insert([
            'user_id' => '5',  
        ]);
    }
}
