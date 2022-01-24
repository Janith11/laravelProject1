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
            'user_id' => 7,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 3,
            'user_id' => 8,
            'attendance' => 1,
        ]);

        // ======================================== shedule 4 ===============================================
        DB::table('attendances')->insert([
            'shedule_id' => 4,
            'user_id' => 7,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 4,
            'user_id' => 8,
            'attendance' => 1,
        ]);

        // ====================================== shedule 5 ================================
        DB::table('attendances')->insert([
            'shedule_id' => 5,
            'user_id' => 8,
            'attendance' => 1,
        ]);

        // =================================== shedule 6 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 6,
            'user_id' => 6,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 6,
            'user_id' => 7,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 6,
            'user_id' => 8,
            'attendance' => 1,
        ]);

        // =================================== shedule 7 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 7,
            'user_id' => 7,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 7,
            'user_id' => 8,
            'attendance' => 1,
        ]);

        // =================================== shedule 8 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 8,
            'user_id' => 6,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 8,
            'user_id' => 7,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 8,
            'user_id' => 8,
            'attendance' => 1,
        ]);

        // =================================== shedule 9 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 9,
            'user_id' => 7,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 9,
            'user_id' => 8,
            'attendance' => 1,
        ]);

        // =================================== shedule 10 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 10,
            'user_id' => 8,
            'attendance' => 1,
        ]);

        // =================================== shedule 11 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 11,
            'user_id' => 7,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 11,
            'user_id' => 8,
            'attendance' => 1,
        ]);

        // =================================== shedule 12 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 12,
            'user_id' => 7,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 12,
            'user_id' => 8,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 12,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 12,
            'user_id' => 10,
            'attendance' => 1,
        ]);

        // =================================== shedule 13 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 13,
            'user_id' => 8,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 13,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 13,
            'user_id' => 10,
            'attendance' => 1,
        ]);

        // =================================== shedule 14 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 14,
            'user_id' => 8,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 14,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 14,
            'user_id' => 10,
            'attendance' => 1,
        ]);

        // =================================== shedule 15 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 15,
            'user_id' => 8,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 15,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 15,
            'user_id' => 10,
            'attendance' => 1,
        ]);

        // =================================== shedule 16 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 16,
            'user_id' => 8,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 16,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 16,
            'user_id' => 10,
            'attendance' => 1,
        ]);

        // =================================== shedule 17 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 17,
            'user_id' => 8,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 17,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 17,
            'user_id' => 10,
            'attendance' => 1,
        ]);

        // =================================== shedule 18 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 18,
            'user_id' => 8,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 18,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 18,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 18,
            'user_id' => 11,
            'attendance' => 1,
        ]);

        // =================================== shedule 19 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 19,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 19,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 19,
            'user_id' => 11,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 19,
            'user_id' => 12,
            'attendance' => 1,
        ]);

        // =================================== shedule 20 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 20,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 20,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 20,
            'user_id' => 11,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 20,
            'user_id' => 12,
            'attendance' => 1,
        ]);

        // =================================== shedule 21 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 21,
            'user_id' => 8,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 21,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 21,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 21,
            'user_id' => 11,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 21,
            'user_id' => 12,
            'attendance' => 1,
        ]);

        // =================================== shedule 22 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 22,
            'user_id' => 8,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 22,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 22,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 22,
            'user_id' => 11,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 22,
            'user_id' => 12,
            'attendance' => 1,
        ]);

        // =================================== shedule 23 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 23,
            'user_id' => 8,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 23,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 23,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 23,
            'user_id' => 11,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 23,
            'user_id' => 12,
            'attendance' => 1,
        ]);

        // =================================== shedule 24 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 24,
            'user_id' => 8,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 24,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 24,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 24,
            'user_id' => 12,
            'attendance' => 1,
        ]);

        // =================================== shedule 25 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 25,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 25,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 25,
            'user_id' => 11,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 25,
            'user_id' => 12,
            'attendance' => 1,
        ]);

        // =================================== shedule 26 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 26,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 26,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 26,
            'user_id' => 11,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 26,
            'user_id' => 12,
            'attendance' => 1,
        ]);

        // =================================== shedule 27 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 26,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 27,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 27,
            'user_id' => 12,
            'attendance' => 1,
        ]);

        // =================================== shedule 28 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 28,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 28,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 28,
            'user_id' => 11,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 28,
            'user_id' => 12,
            'attendance' => 1,
        ]);

        // =================================== shedule 29 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 29,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 29,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 29,
            'user_id' => 11,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 29,
            'user_id' => 12,
            'attendance' => 1,
        ]);

        // =================================== shedule 30 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 30,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 30,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 30,
            'user_id' => 11,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 30,
            'user_id' => 12,
            'attendance' => 1,
        ]);

        // =================================== shedule 31 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 31,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 31,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 31,
            'user_id' => 12,
            'attendance' => 1,
        ]);

        // =================================== shedule 32 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 32,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 32,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 32,
            'user_id' => 11,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 32,
            'user_id' => 12,
            'attendance' => 1,
        ]);

        // =================================== shedule 33 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 33,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 33,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 33,
            'user_id' => 12,
            'attendance' => 1,
        ]);

        // =================================== shedule 34 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 34,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 34,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 34,
            'user_id' => 11,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 34,
            'user_id' => 12,
            'attendance' => 1,
        ]);

        // =================================== shedule 35 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 35,
            'user_id' => 9,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 35,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 35,
            'user_id' => 12,
            'attendance' => 1,
        ]);

        // =================================== shedule 36 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 36,
            'user_id' => 11,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 36,
            'user_id' => 12,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 36,
            'user_id' => 13,
            'attendance' => 1,
        ]);

        // =================================== shedule 37 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 37,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 37,
            'user_id' => 11,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 37,
            'user_id' => 12,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 37,
            'user_id' => 13,
            'attendance' => 1,
        ]);

        // =================================== shedule 38 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 38,
            'user_id' => 11,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 38,
            'user_id' => 13,
            'attendance' => 1,
        ]);

        // =================================== shedule 39 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 39,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 39,
            'user_id' => 12,
            'attendance' => 1,
        ]);

        // =================================== shedule 40 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 40,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 40,
            'user_id' => 11,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 40,
            'user_id' => 12,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 40,
            'user_id' => 13,
            'attendance' => 1,
        ]);

        // =================================== shedule 41 ===================================
        DB::table('attendances')->insert([
            'shedule_id' => 41,
            'user_id' => 10,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 41,
            'user_id' => 11,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 41,
            'user_id' => 12,
            'attendance' => 1,
        ]);
        DB::table('attendances')->insert([
            'shedule_id' => 41,
            'user_id' => 13,
            'attendance' => 1,
        ]);
    }
}
