<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('time_slots')->insert([
            'weekday_id' => 1,
            'time_slot' => '08:00:00',
            'slot_name' => 'First Slot',
        ]);
        DB::table('time_slots')->insert([
            'weekday_id' => 1,
            'time_slot' => '10:00:00',
            'slot_name' => 'Second Slot',
        ]);
        DB::table('time_slots')->insert([
            'weekday_id' => 1,
            'time_slot' => '01:00:00',
            'slot_name' => 'Third Slot',
        ]);
        DB::table('time_slots')->insert([
            'weekday_id' => 1,
            'time_slot' => '03:00:00',
            'slot_name' => 'Final Slot',
        ]);
    }
}
