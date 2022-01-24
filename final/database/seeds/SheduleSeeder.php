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
        // 1
        DB::table('shedules')->insert([
            'title' => 'session 01',
            'date' => '2021-10-25',
            'time' => '08:00:00',
            'lesson_type' => 'theory',
            'instructor' => '2',
            'vahicle_category' => '-',
            'transmission' => '-',
            'shedule_status' => 2,
        ]);

        // 2
        DB::table('shedules')->insert([
            'title' => 'session 02',
            'date' => '2021-10-26',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'A',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);

        // 3
        DB::table('shedules')->insert([
            'title' => 'session 03',
            'date' => '2021-10-25',
            'time' => '10:00:00',
            'lesson_type' => 'theory',
            'instructor' => '2',
            'vahicle_category' => '-',
            'transmission' => '-',
            'shedule_status' => 2,
        ]);

        // 4
        DB::table('shedules')->insert([
            'title' => 'session 04',
            'date' => '2021-10-29',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'A',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);

        // 5
        DB::table('shedules')->insert([
            'title' => 'session 05',
            'date' => '2021-10-30',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'B1',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);

        // 6
        DB::table('shedules')->insert([
            'title' => 'session 06',
            'date' => '2021-11-01',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'C1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 7
        DB::table('shedules')->insert([
            'title' => 'session 07',
            'date' => '2021-11-02',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'A',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);

        // 8
        DB::table('shedules')->insert([
            'title' => 'session 08',
            'date' => '2021-11-04',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'B1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 9
        DB::table('shedules')->insert([
            'title' => 'session 09',
            'date' => '2021-11-05',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'A',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);

        // 10
        DB::table('shedules')->insert([
            'title' => 'session 10',
            'date' => '2021-11-06',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'B1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 11
        DB::table('shedules')->insert([
            'title' => 'session 11',
            'date' => '2021-11-07',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'C1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 12
        DB::table('shedules')->insert([
            'title' => 'session 12',
            'date' => '2021-11-07',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'C1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 13
        DB::table('shedules')->insert([
            'title' => 'session 13',
            'date' => '2021-11-08',
            'time' => '10:00:00',
            'lesson_type' => 'theory',
            'instructor' => '2',
            'vahicle_category' => '-',
            'transmission' => '-',
            'shedule_status' => 2,
        ]);

        // 14
        DB::table('shedules')->insert([
            'title' => 'session 14',
            'date' => '2021-11-08',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '3',
            'vahicle_category' => 'A',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);

        // 15
        DB::table('shedules')->insert([
            'title' => 'session 15',
            'date' => '2021-11-11',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'B1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 16
        DB::table('shedules')->insert([
            'title' => 'session 16',
            'date' => '2021-11-12',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'B1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 17
        DB::table('shedules')->insert([
            'title' => 'session 17',
            'date' => '2021-11-13',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'C1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 18
        DB::table('shedules')->insert([
            'title' => 'session 18',
            'date' => '2021-11-14',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'B1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 19
        DB::table('shedules')->insert([
            'title' => 'session 19',
            'date' => '2021-11-15',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'B1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 20
        DB::table('shedules')->insert([
            'title' => 'session 20',
            'date' => '2021-11-15',
            'time' => '10:00:00',
            'lesson_type' => 'theory',
            'instructor' => '2',
            'vahicle_category' => '-',
            'transmission' => '-',
            'shedule_status' => 2,
        ]);

        // 21
        DB::table('shedules')->insert([
            'title' => 'session 21',
            'date' => '2021-11-17',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'B1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 22
        DB::table('shedules')->insert([
            'title' => 'session 22',
            'date' => '2021-11-20',
            'time' => '10:00:00',
            'lesson_type' => 'theory',
            'instructor' => '3',
            'vahicle_category' => '-',
            'transmission' => '-',
            'shedule_status' => 2,
        ]);

        // 23
        DB::table('shedules')->insert([
            'title' => 'session 23',
            'date' => '2021-11-20',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'A',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);

        // 24
        DB::table('shedules')->insert([
            'title' => 'session 24',
            'date' => '2021-11-22',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'A',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);

        // 25
        DB::table('shedules')->insert([
            'title' => 'session 25',
            'date' => '2021-11-24',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'A',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);

        // 26
        DB::table('shedules')->insert([
            'title' => 'session 26',
            'date' => '2021-11-26',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'B1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 27
        DB::table('shedules')->insert([
            'title' => 'session 27',
            'date' => '2021-11-28',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'C1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 28
        DB::table('shedules')->insert([
            'title' => 'session 28',
            'date' => '2021-11-30',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'C1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 29
        DB::table('shedules')->insert([
            'title' => 'session 29',
            'date' => '2021-12-01',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'B1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 30
        DB::table('shedules')->insert([
            'title' => 'session 30',
            'date' => '2021-12-05',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'A',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);

        // 31
        DB::table('shedules')->insert([
            'title' => 'session 31',
            'date' => '2021-12-15',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'A',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);

        // 32
        DB::table('shedules')->insert([
            'title' => 'session 32',
            'date' => '2021-12-20',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'B1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 33
        DB::table('shedules')->insert([
            'title' => 'session 33',
            'date' => '2021-12-25',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'C1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 34
        DB::table('shedules')->insert([
            'title' => 'session 34',
            'date' => '2021-12-30',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'A',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);

        // 35
        DB::table('shedules')->insert([
            'title' => 'session 35',
            'date' => '2022-01-02',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'A',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);

        // 36
        DB::table('shedules')->insert([
            'title' => 'session 36',
            'date' => '2022-01-03',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'B1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 37
        DB::table('shedules')->insert([
            'title' => 'session 37',
            'date' => '2022-01-05',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'C1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 38
        DB::table('shedules')->insert([
            'title' => 'session 38',
            'date' => '2022-01-08',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'B1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 39
        DB::table('shedules')->insert([
            'title' => 'session 39',
            'date' => '2022-01-11',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'C1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 40
        DB::table('shedules')->insert([
            'title' => 'session 40',
            'date' => '2022-01-12',
            'time' => '10:00:00',
            'lesson_type' => 'theory',
            'instructor' => '2',
            'vahicle_category' => '-',
            'transmission' => '-',
            'shedule_status' => 2,
        ]);

        // 41
        DB::table('shedules')->insert([
            'title' => 'session 41',
            'date' => '2022-01-15',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'B1',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 42
        DB::table('shedules')->insert([
            'title' => 'session 42',
            'date' => '2022-01-18',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'A',
            'transmission' => 'Auto',
            'shedule_status' => 2,
        ]);

        // 43
        DB::table('shedules')->insert([
            'title' => 'session 43',
            'date' => '2022-01-21',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'A',
            'transmission' => 'Manual',
            'shedule_status' => 2,
        ]);

        // 44
        DB::table('shedules')->insert([
            'title' => 'session 44',
            'date' => '2022-01-24',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'C1',
            'transmission' => 'Manual',
            'shedule_status' => 1,
        ]);

        // 45
        DB::table('shedules')->insert([
            'title' => 'session 45',
            'date' => '2022-01-24',
            'time' => '14:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'B1',
            'transmission' => 'Manual',
            'shedule_status' => 1,
        ]);

        //46
        DB::table('shedules')->insert([
            'title' => 'session 46',
            'date' => '2022-01-25',
            'time' => '10:00:00',
            'lesson_type' => 'practicle',
            'instructor' => '2',
            'vahicle_category' => 'A',
            'transmission' => 'Auto',
            'shedule_status' => 1,
        ]);
    }
}
