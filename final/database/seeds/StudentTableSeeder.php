<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'user_id' => '6',
            'paid_amount' => '0',
            'total_fee' => '16000',
            'completed_session'=> '4',
            'total_session'=>'30',
            'group_number' => '1',
        ]);
        DB::table('students')->insert([
            'user_id' => '7',
            'paid_amount' => '4000',
            'total_fee' => '17500',
            'completed_session'=> '4',
            'total_session'=>'30',
            'group_number' => '1',
        ]);
        DB::table('students')->insert([
            'user_id' => '8',
            'paid_amount' => '8000',
            'total_fee' => '21000',
            'completed_session'=> '4',
            'total_session'=>'30',
            'group_number' => '1',
        ]);
        DB::table('students')->insert([
            'user_id' => '9',
            'paid_amount' => '0',
            'total_fee' => '22000',
            'completed_session'=> '4',
            'total_session'=>'30',
            'group_number' => '1',
        ]);
        DB::table('students')->insert([
            'user_id' => '10',
            'paid_amount' => '10000',
            'total_fee' => '18000',
            'completed_session'=> '4',
            'total_session'=>'30',
            'group_number' => '1',
        ]);
        
    }
}
