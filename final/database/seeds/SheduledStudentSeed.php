<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SheduledStudentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sheduled_students')->insert([
            'shedule_id' => '1',
            'student_id' => '6',
        ]);
        DB::table('sheduled_students')->insert([
            'shedule_id' => '1',
            'student_id' => '7',
        ]);

        // ============================= shedule 2 =======================================
        DB::table('sheduled_students')->insert([
            'shedule_id' => '2',
            'student_id' => '6',
        ]);
        DB::table('sheduled_students')->insert([
            'shedule_id' => '2',
            'student_id' => '7',
        ]);
        DB::table('sheduled_students')->insert([
            'shedule_id' => '2',
            'student_id' => '8',
        ]);

        // ============================= shedule 3 =====================================
        DB::table('sheduled_students')->insert([
            'shedule_id' => '3',
            'student_id' => '6',
        ]);
        DB::table('sheduled_students')->insert([
            'shedule_id' => '3',
            'student_id' => '7',
        ]);
        DB::table('sheduled_students')->insert([
            'shedule_id' => '3',
            'student_id' => '8',
        ]);
        DB::table('sheduled_students')->insert([
            'shedule_id' => '3',
            'student_id' => '9',
        ]);

        // ============================= shedule 4 =====================================
        DB::table('sheduled_students')->insert([
            'shedule_id' => '4',
            'student_id' => '6',
        ]);
        DB::table('sheduled_students')->insert([
            'shedule_id' => '4',
            'student_id' => '7',
        ]);
        DB::table('sheduled_students')->insert([
            'shedule_id' => '4',
            'student_id' => '8',
        ]);
        DB::table('sheduled_students')->insert([
            'shedule_id' => '4',
            'student_id' => '9',
        ]);
        DB::table('sheduled_students')->insert([
            'shedule_id' => '4',
            'student_id' => '10',
        ]);

        // ================================== shedule 5 ============================
        DB::table('sheduled_students')->insert([
            'shedule_id' => '5',
            'student_id' => '7',
        ]);
    }
}
