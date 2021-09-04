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
        //Monday
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
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 2,
        //     'instructor_uid' => 5,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 3,
        //     'instructor_uid' => 2,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 4,
        //     'instructor_uid' => 5,
        // ]);

        //Tuesday
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 5,
        //     'instructor_uid' => 2,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 5,
        //     'instructor_uid' => 3,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 6,
        //     'instructor_uid' => 4,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 6,
        //     'instructor_uid' => 5,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 7,
        //     'instructor_uid' => 2,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 8,
        //     'instructor_uid' => 5,
        // ]);

        //Wednesday
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 9,
        //     'instructor_uid' => 2,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 9,
        //     'instructor_uid' => 3,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 10,
        //     'instructor_uid' => 4,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 10,
        //     'instructor_uid' => 5,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 11,
        //     'instructor_uid' => 2,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 12,
        //     'instructor_uid' => 5,
        // ]);

        //Thursday
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 13,
        //     'instructor_uid' => 2,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 13,
        //     'instructor_uid' => 3,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 14,
        //     'instructor_uid' => 4,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 14,
        //     'instructor_uid' => 5,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 15,
        //     'instructor_uid' => 2,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 16,
        //     'instructor_uid' => 5,
        // ]);

        //Friday
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 17,
        //     'instructor_uid' => 2,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 17,
        //     'instructor_uid' => 3,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 18,
        //     'instructor_uid' => 4,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 18,
        //     'instructor_uid' => 5,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 19,
        //     'instructor_uid' => 2,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 20,
        //     'instructor_uid' => 5,
        // ]);

        //Saturday
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 21,
        //     'instructor_uid' => 2,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 21,
        //     'instructor_uid' => 3,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 22,
        //     'instructor_uid' => 4,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 22,
        //     'instructor_uid' => 5,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 23,
        //     'instructor_uid' => 2,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 24,
        //     'instructor_uid' => 5,
        // ]);

        //Sunday
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 25,
        //     'instructor_uid' => 2,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 25,
        //     'instructor_uid' => 3,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 26,
        //     'instructor_uid' => 4,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 26,
        //     'instructor_uid' => 5,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 27,
        //     'instructor_uid' => 2,
        // ]);
        // DB::table('instructor_working_time_slots')->insert([
        //     'time_slot_id' => 28,
        //     'instructor_uid' => 5,
        // ]);
    }
}
