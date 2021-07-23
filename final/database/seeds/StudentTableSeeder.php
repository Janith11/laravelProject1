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
            'user_id' => '3',
            'amount' => '4000',
            'total_fee' => '16000',
            'group_number' => '1',
        ]);
        DB::table('students')->insert([
            'user_id' => '4',
            'amount' => '6000',
            'total_fee' => '17500',
            'group_number' => '1',
        ]);
    }
}
