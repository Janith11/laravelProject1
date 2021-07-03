<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpenHoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('open_hours')->insert([
            'weekday_id' => 1,
            'from' => '08:00',
            'to' => '17:00'
        ]);

        DB::table('open_hours')->insert([
            'weekday_id' => 2,
            'from' => '08:00',
            'to' => '17:00'
        ]);

        DB::table('open_hours')->insert([
            'weekday_id' => 3,
            'from' => '08:00',
            'to' => '17:00'
        ]);

        DB::table('open_hours')->insert([
            'weekday_id' => 4,
            'from' => '08:00',
            'to' => '17:00'
        ]);

        DB::table('open_hours')->insert([
            'weekday_id' => 5,
            'from' => '08:00',
            'to' => '17:00'
        ]);

        DB::table('open_hours')->insert([
            'weekday_id' => 6,
            'from' => '08:00',
            'to' => '17:00'
        ]);

        DB::table('open_hours')->insert([
            'weekday_id' => 7,
            'from' => '08:00',
            'to' => '17:00'
        ]);
    }
}
