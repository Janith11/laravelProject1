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
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 2,
            'student_id' => 8,
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
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 3,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-28 15:31:32.000000',
        ]);

        // ========================== 4 =======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 4,
            'student_id' => 6,
            'alert_status' => 0,
            'created_at' => '2021-06-30 15:32:00.000000',
        ]);
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
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 4,
            'student_id' => 9,
            'alert_status' => 0,
            'created_at' => '2021-06-30 15:32:00.000000',
        ]);
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 4,
            'student_id' => 10,
            'alert_status' => 0,
            'created_at' => '2021-06-30 15:32:00.000000',
        ]);

        // ==================== 5 ======================
        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 5,
            'student_id' => 7,
            'alert_status' => 0,
            'created_at' => '2021-07-01 15:32:00.000000',
        ]);
    }
}
