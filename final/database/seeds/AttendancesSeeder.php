<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attendances')->insert([
            'shedule_id' => 1,
            'user_id' => 6,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 3,
            'user_id' => 6,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 4,
            'user_id' => 6,
            'attendance' => 0,
        ]);
    }
}
