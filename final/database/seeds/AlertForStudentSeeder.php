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
        ]);

        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 1,
            'student_id' => 7,
            'alert_status' => 0,
        ]);

        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 1,
            'student_id' => 8,
            'alert_status' => 0,
        ]);

        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 2,
            'student_id' => 6,
            'alert_status' => 0,
        ]);

        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 3,
            'student_id' => 6,
            'alert_status' => 0,
        ]);

        DB::table('alert_for_students')->insert([
            'shedulealert_id' => 4,
            'student_id' => 6,
            'alert_status' => 0,
        ]);
    }
}
