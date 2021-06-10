<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeekDaySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('week_days')->insert([
            'day_name' => 'monday',
        ]);

        DB::table('week_days')->insert([
            'day_name' => 'tuesday',
        ]);

        DB::table('week_days')->insert([
            'day_name' => 'wednesday',
        ]);

        DB::table('week_days')->insert([
            'day_name' => 'thursday',
        ]);

        DB::table('week_days')->insert([
            'day_name' => 'friday',
        ]);

        DB::table('week_days')->insert([
            'day_name' => 'saturday',
        ]);

        DB::table('week_days')->insert([
            'day_name' => 'sunday',
        ]);
    }
}
