<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwnerSheduleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owner_shedules')->insert([
            'title' => 'test one',
            'date' => '2021-06-25',
            'color' => '#90EE90',
            'time' => '08:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'shedule_status' => 2,
        ]);

        DB::table('owner_shedules')->insert([
            'title' => 'test two',
            'date' => '2021-06-28',
            'color' => '#90EE90',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'shedule_status' => 2,
        ]);

        DB::table('owner_shedules')->insert([
            'title' => 'test three',
            'date' => '2021-06-30',
            'color' => '#90EE90',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'shedule_status' => 2,
        ]);

        DB::table('owner_shedules')->insert([
            'title' => 'test four',
            'date' => '2021-07-01',
            'color' => '#90EE90',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'shedule_status' => 2,
        ]);

        DB::table('owner_shedules')->insert([
            'title' => 'test five',
            'date' => '2021-07-03',
            'color' => '#90EE90',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'shedule_status' => 2,
        ]);
    }
}
