<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shedules')->insert([
            'title' => 'test one',
            'date' => '2021-06-25',
            'time' => '08:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'C',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);

        DB::table('shedules')->insert([
            'title' => 'test two',
            'date' => '2021-06-28',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'A',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);

        DB::table('shedules')->insert([
            'title' => 'test three',
            'date' => '2021-06-30',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'A',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);

        DB::table('shedules')->insert([
            'title' => 'test four',
            'date' => '2021-07-01',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'C',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);

        DB::table('shedules')->insert([
            'title' => 'test five',
            'date' => '2021-07-03',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'A',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);
    }
}
