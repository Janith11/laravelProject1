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
            'shedule_id' => 1,
            'user_id' => 7,
            'attendance' => 1,
        ]);

        // ===================================== shedule 2 ==========================================
        DB::table('attendances')->insert([
            'shedule_id' => 2,
            'user_id' => 6,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 2,
            'user_id' => 8,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 2,
            'user_id' => 7,
            'attendance' => 1,
        ]);

        // ====================================== shedule 3 ==========================================
        DB::table('attendances')->insert([
            'shedule_id' => 3,
            'user_id' => 6,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 3,
            'user_id' => 8,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 3,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 3,
            'user_id' => 7,
            'attendance' => 1,
        ]);

        // ======================================== shedule 4 ===============================================
        DB::table('attendances')->insert([
            'shedule_id' => 4,
            'user_id' => 6,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 4,
            'user_id' => 8,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 4,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 4,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 4,
            'user_id' => 7,
            'attendance' => 1,
        ]);

        // ====================================== shedule 5 ================================
        DB::table('attendances')->insert([
            'shedule_id' => 5,
            'user_id' => 7,
            'attendance' => 1,
        ]);
    }
}
