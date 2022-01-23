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
        // completed students
        DB::table('students')->insert([
            'user_id' => '6',
            'paid_amount' => '14000',
            'total_fee' => '14000',
            'completed_session'=> '5',
            'total_session'=>'5',
            'group_number' => '1',
        ]);
        DB::table('students')->insert([
            'user_id' => '7',
            'paid_amount' => '17500',
            'total_fee' => '17500',
            'completed_session'=> '10',
            'total_session'=>'10',
            'group_number' => '1',
        ]);
        DB::table('students')->insert([
            'user_id' => '8',
            'paid_amount' => '21000',
            'total_fee' => '21000',
            'completed_session'=> '20',
            'total_session'=>'20',
            'group_number' => '1',
        ]);

        // in progress students
        DB::table('students')->insert([
            'user_id' => '9',
            'paid_amount' => '10000',
            'total_fee' => '22000',
            'completed_session'=> '24',
            'total_session'=>'30',
            'group_number' => '2',
        ]);
        DB::table('students')->insert([
            'user_id' => '10',
            'paid_amount' => '10000',
            'total_fee' => '18000',
            'completed_session'=> '25',
            'total_session'=>'30',
            'group_number' => '2',
        ]);
        DB::table('students')->insert([
            'user_id' => '11',
            'paid_amount' => '10000',
            'total_fee' => '18000',
            'completed_session' => '15',
            'total_session' => '30',
            'group_number' => '2',
        ]);
        DB::table('students')->insert([
            'user_id' => '12',
            'paid_amount' => '10000',
            'total_fee' => '18000',
            'completed_session' => '19',
            'total_session' => '30',
            'group_number' => '2',
        ]);
        DB::table('students')->insert([
            'user_id' => '13',
            'paid_amount' => '10000',
            'total_fee' => '18000',
            'completed_session' => '2',
            'total_session' => '30',
            'group_number' => '2',
        ]);
    }
}
