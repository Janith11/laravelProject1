<?php

use Illuminate\Database\Seeder;

class ExamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exams')->insert([
            'user_id' => '3',
            'type'  => 'theory',
            'date'  => '2021-06-22',
            'result' => 'pass',
            'attempt'   => '1',
        ]);

        DB::table('exams')->insert([
            'user_id' => '3',
            'type'  => 'practical',
            'date'  => '2021-07-22',
            'result' => 'fail',
            'attempt'   => '1',
        ]);

        DB::table('exams')->insert([
            'user_id' => '3',
            'type'  => 'practical',
            'date'  => '2021-08-30',
            'result' => 'pass',
            'attempt'   => '2',
        ]);

        DB::table('exams')->insert([
            'user_id' => '4',
            'type'  => 'theory',
            'date'  => '2021-06-30',
            'result' => 'pass',
            'attempt'   => '1',
        ]);

        DB::table('exams')->insert([
            'user_id' => '4',
            'type'  => 'practical',
            'date'  => '2021-09-30',
            'result' => 'pass',
            'attempt'   => '1',
        ]);
    }
}
