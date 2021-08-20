<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstructorforTimeSlot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instructor_working_time_slots')->insert([
            'time_slot_id' => 1,
            'instructor_uid' => 2,
        ]);
        DB::table('instructor_working_time_slots')->insert([
            'time_slot_id' => 1,
            'instructor_uid' => 3,
        ]);
        DB::table('instructor_working_time_slots')->insert([
            'time_slot_id' => 2,
            'instructor_uid' => 4,
        ]);
        DB::table('instructor_working_time_slots')->insert([
            'time_slot_id' => 2,
            'instructor_uid' => 5,
        ]);
        DB::table('instructor_working_time_slots')->insert([
            'time_slot_id' => 3,
            'instructor_uid' => 2,
        ]);
        DB::table('instructor_working_time_slots')->insert([
            'time_slot_id' => 4,
            'instructor_uid' => 5,
        ]);
    }
}
