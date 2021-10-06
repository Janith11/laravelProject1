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
        // Monday
        DB::table('time_slots')->insert([
            'weekday_id' => 1,
            'time_slot' => '08:00:00',
            'slot_name' => 'Morning Session 1',
            'exam_type' => 'theory',
            'vehicle_category' => '-',
            'transmission' => '-'
        ]);
        DB::table('time_slots')->insert([
            'weekday_id' => 1,
            'time_slot' => '10:00:00',
            'slot_name' => 'Morning session 2',
            'exam_type' => 'practical',
            'vehicle_category' => 'bike',
            'transmission' => 'auto'
        ]);
        DB::table('time_slots')->insert([
            'weekday_id' => 1,
            'time_slot' => '01:00:00',
            'slot_name' => 'Evening session 1',
            'exam_type' => 'practicle',
            'vehicle_category' => 'three weel',
            'transmission' => 'manual'
        ]);
        DB::table('time_slots')->insert([
            'weekday_id' => 1,
            'time_slot' => '03:00:00',
            'slot_name' => 'Evening Session 2',
            'exam_type' => 'practicle',
            'vehicle_category' => 'dual purposes',
            'transmission' => 'manual'
        ]);

        // Tuesday
        DB::table('time_slots')->insert([
            'weekday_id' => 2,
            'time_slot' => '08:00:00',
            'slot_name' => 'Morning Session 1',
            'exam_type' => 'theory',
            'vehicle_category' => '-',
            'transmission' => '-'
        ]);
        DB::table('time_slots')->insert([
            'weekday_id' => 2,
            'time_slot' => '10:00:00',
            'slot_name' => 'Morning session 2',
            'exam_type' => 'practicle',
            'vehicle_category' => 'bike',
            'transmission' => 'manual'
        ]);
        DB::table('time_slots')->insert([
            'weekday_id' => 2,
            'time_slot' => '01:00:00',
            'slot_name' => 'Evening session 1',
            'exam_type' => 'practicle',
            'vehicle_category' => 'dual purposes',
            'transmission' => 'auto'
        ]);
        DB::table('time_slots')->insert([
            'weekday_id' => 2,
            'time_slot' => '03:00:00',
            'slot_name' => 'Evening Session 2',
            'exam_type' => 'practicle',
            'vehicle_category' => 'heavy vehicle',
            'transmission' => 'manual'
        ]);

        // Wednesday
        // DB::table('time_slots')->insert([
        //     'weekday_id' => 3,
        //     'time_slot' => '08:00:00',
        //     'slot_name' => 'Morning Session 1',
        // ]);
        // DB::table('time_slots')->insert([
        //     'weekday_id' => 3,
        //     'time_slot' => '10:00:00',
        //     'slot_name' => 'Morning session 2',
        // ]);
        // DB::table('time_slots')->insert([
        //     'weekday_id' => 3,
        //     'time_slot' => '01:00:00',
        //     'slot_name' => 'Evening session 1',
        // ]);
        // DB::table('time_slots')->insert([
        //     'weekday_id' => 3,
        //     'time_slot' => '03:00:00',
        //     'slot_name' => 'Evening Session 2',
        // ]);

        // Thursday
        DB::table('time_slots')->insert([
            'weekday_id' => 4,
            'time_slot' => '08:00:00',
            'slot_name' => 'Morning Session 1',
            'exam_type' => 'theory',
            'vehicle_category' => '-',
            'transmission' => '-'
        ]);
        DB::table('time_slots')->insert([
            'weekday_id' => 4,
            'time_slot' => '10:00:00',
            'slot_name' => 'Morning session 2',
            'exam_type' => 'practicle',
            'vehicle_category' => 'heavy vehicle',
            'transmission' => 'manual'
        ]);
        DB::table('time_slots')->insert([
            'weekday_id' => 4,
            'time_slot' => '01:00:00',
            'slot_name' => 'Evening session 1',
            'exam_type' => 'practicle',
            'vehicle_category' => 'bike',
            'transmission' => 'auto'
        ]);
        DB::table('time_slots')->insert([
            'weekday_id' => 4,
            'time_slot' => '03:00:00',
            'slot_name' => 'Evening Session 2',
            'exam_type' => 'practicle',
            'vehicle_category' => 'bike',
            'transmission' => 'manual'
        ]);

        // Friday
        DB::table('time_slots')->insert([
            'weekday_id' => 5,
            'time_slot' => '08:00:00',
            'slot_name' => 'Morning Session 1',
            'exam_type' => 'practicle',
            'vehicle_category' => 'bike',
            'transmission' => 'auto'
        ]);
        DB::table('time_slots')->insert([
            'weekday_id' => 5,
            'time_slot' => '10:00:00',
            'slot_name' => 'Morning session 2',
            'exam_type' => 'practicle',
            'vehicle_category' => 'three weel',
            'transmission' => 'maual'
        ]);
        DB::table('time_slots')->insert([
            'weekday_id' => 5,
            'time_slot' => '01:00:00',
            'slot_name' => 'Evening session 1',
            'exam_type' => 'practicle',
            'vehicle_category' => 'diual purposes',
            'transmission' => 'manual'
        ]);
        DB::table('time_slots')->insert([
            'weekday_id' => 5,
            'time_slot' => '03:00:00',
            'slot_name' => 'Evening Session 2',
            'exam_type' => 'practicl',
            'vehicle_category' => 'dual purposes',
            'transmission' => 'auto'
        ]);

        // Saturday
        DB::table('time_slots')->insert([
            'weekday_id' => 6,
            'time_slot' => '08:00:00',
            'slot_name' => 'Morning Session 1',
            'exam_type' => 'practicle',
            'vehicle_category' => 'dual purposes',
            'transmission' => 'manual'
        ]);
        DB::table('time_slots')->insert([
            'weekday_id' => 6,
            'time_slot' => '10:00:00',
            'slot_name' => 'Morning session 2',
            'exam_type' => 'practicle',
            'vehicle_category' => 'three weel',
            'transmission' => 'manual'
        ]);
        DB::table('time_slots')->insert([
            'weekday_id' => 6,
            'time_slot' => '01:00:00',
            'slot_name' => 'Evening session 1',
            'exam_type' => 'practicle',
            'vehicle_category' => 'bike',
            'transmission' => 'auto'
        ]);
        DB::table('time_slots')->insert([
            'weekday_id' => 6,
            'time_slot' => '03:00:00',
            'slot_name' => 'Evening Session 2',
            'exam_type' => 'practicle',
            'vehicle_category' => 'bike',
            'transmission' => 'manual'
        ]);

        // Sunday
        // DB::table('time_slots')->insert([
        //     'weekday_id' => 7,
        //     'time_slot' => '08:00:00',
        //     'slot_name' => 'Morning Session 1',
        // ]);
        // DB::table('time_slots')->insert([
        //     'weekday_id' => 7,
        //     'time_slot' => '10:00:00',
        //     'slot_name' => 'Morning session 2',
        // ]);
        // DB::table('time_slots')->insert([
        //     'weekday_id' => 7,
        //     'time_slot' => '01:00:00',
        //     'slot_name' => 'Evening session 1',
        // ]);
        // DB::table('time_slots')->insert([
        //     'weekday_id' => 7,
        //     'time_slot' => '03:00:00',
        //     'slot_name' => 'Evening Session 2',
        // ]);

    }
}
