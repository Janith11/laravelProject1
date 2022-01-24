<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlertForStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 1,
            'student_id' => 6,
            'alert_status' => 0,
            'created_at' => '2021-06-20 15:29:08.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 1,
            'student_id' => 7,
            'alert_status' => 0,
            'created_at' => '2021-06-20 15:29:08.000000',
        ]);

        // ========================= 2 ========================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 2,
            'student_id' => 6,
            'alert_status' => 0,
            'created_at' => '2021-06-25 15:29:08.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 2,
            'student_id' => 7,
            'alert_status' => 0,
            'created_at' => '2021-06-25 15:29:08.000000',
        ]);

        // ========================= 3 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 3,
            'student_id' => 6,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:29:08.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 3,
            'student_id' => 7,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 3,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);

        // ========================== 4 =======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 4,
            'student_id' => 7,
            'alert_status' => 0,
            'created_at' => '2021-06-30 15:32:00.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 4,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-30 15:32:00.000000',
        ]);

        // ==================== 5 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 5,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-07-01 15:32:00.000000',
        ]);

        // ========================= 6 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 6,
            'student_id' => 6,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:29:08.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 6,
            'student_id' => 7,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 6,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);

        // ========================= 7 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 7,
            'student_id' => 7,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 7,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);

        // ========================= 8 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 8,
            'student_id' => 6,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:29:08.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 8,
            'student_id' => 7,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 8,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);

        // ========================= 9 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 9,
            'student_id' => 7,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 9,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);

        // ========================= 10 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 10,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);

        // ========================= 11 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' =>11,
            'student_id' => 7,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 11,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);

        // ========================= 12 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 12,
            'student_id' => 7,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 12,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 12,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 12,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);

        // ========================= 13 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 13,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 13,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 13,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);

        // ========================= 14 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 14,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 14,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 14,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);

        // ========================= 15 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 15,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 15,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 15,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);

        // ========================= 16 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 16,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 16,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 16,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);

        // ========================= 17 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 17,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 17,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 17,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);

        // ========================= 18 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 18,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 18,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 18,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 18,
            'student_id' => 11,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);

        // ========================= 19 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 19,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 19,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 19,
            'student_id' => 11,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 19,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);

        // ========================= 20 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 20,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 20,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 20,
            'student_id' => 11,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 20,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);

        // ========================= 21 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 21,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 21,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 21,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 21,
            'student_id' => 11,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 21,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);

        // ========================= 22 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 22,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 22,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 22,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 22,
            'student_id' => 11,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 22,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);

        // ========================= 23 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 23,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 23,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 23,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 23,
            'student_id' => 11,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 23,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);

        // ========================= 24 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 24,
            'student_id' => 8,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 24,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 24,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 24,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);

        // ========================= 25 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 25,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 25,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 25,
            'student_id' => 11,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 25,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);

        // ========================= 26 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 26,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 26,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 26,
            'student_id' => 11,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 26,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);


        // ========================= 27 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 27,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 27,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 27,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);

        // ========================= 28 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 28,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 28,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 28,
            'student_id' => 11,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 28,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);

        // ========================= 29 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 29,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 29,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 29,
            'student_id' => 11,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 29,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);

        // ========================= 30 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 30,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 30,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 30,
            'student_id' => 11,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 30,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);

        // ========================= 31 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 31,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 31,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 31,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);

        // ========================= 32 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 32,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 32,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 32,
            'student_id' => 11,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 32,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);

        // ========================= 33 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 33,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 33,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 33,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);

        // ========================= 34 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 34,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 34,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 34,
            'student_id' => 11,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 34,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);

        // ========================= 35 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 35,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 35,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 35,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);

        // ========================= 36 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 36,
            'student_id' => 11,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 36,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 36,
            'student_id' => 13,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);

        // ========================= 37 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 37,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 37,
            'student_id' => 11,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 37,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 37,
            'student_id' => 13,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);

        // ========================= 38 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 38,
            'student_id' => 11,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 38,
            'student_id' => 13,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);

        // ========================= 39 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 39,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 39,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);

        // ========================= 40 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 40,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 40,
            'student_id' => 11,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 40,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 40,
            'student_id' => 13,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);

        // ========================= 41 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 41,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 41,
            'student_id' => 11,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 41,
            'student_id' => 12,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:30:33.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 41,
            'student_id' => 13,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);
    }
}
