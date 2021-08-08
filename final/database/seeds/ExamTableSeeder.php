<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'user_id' => '6',
            'type'  => 'theory',
            'date'  => '2021-06-22',
            'result' => 'pass',
            'attempt'   => '1',
        ]);
        DB::table('exams')->insert([
            'user_id' => '6',
            'type'  => 'practical',
            'date'  => '2021-07-22',
            'result' => 'fail',
            'attempt'   => '1',
        ]);

        DB::table('exams')->insert([
            'user_id' => '7',
            'type'  => 'theory',
            'date'  => '2021-06-22',
            'result' => 'pass',
            'attempt'   => '1',
        ]);
        DB::table('exams')->insert([
            'user_id' => '7',
            'type'  => 'practical',
            'date'  => '2021-07-22',
            'result' => 'fail',
            'attempt'   => '1',
        ]);

        DB::table('exams')->insert([
            'user_id' => '8',
            'type'  => 'theory',
            'date'  => '2021-06-22',
            'result' => 'pass',
            'attempt'   => '1',
        ]);
        DB::table('exams')->insert([
            'user_id' => '8',
            'type'  => 'practical',
            'date'  => '2021-07-22',
            'result' => 'fail',
            'attempt'   => '1',
        ]);

        DB::table('exams')->insert([
            'user_id' => '9',
            'type'  => 'theory',
            'date'  => '2021-06-22',
            'result' => 'pass',
            'attempt'   => '1',
        ]);
        DB::table('exams')->insert([
            'user_id' => '9',
            'type'  => 'practical',
            'date'  => '2021-07-22',
            'result' => 'fail',
            'attempt'   => '1',
        ]);

        DB::table('exams')->insert([
            'user_id' => '10',
            'type'  => 'theory',
            'date'  => '2021-06-22',
            'result' => 'pass',
            'attempt'   => '1',
        ]);
        DB::table('exams')->insert([
            'user_id' => '10',
            'type'  => 'practical',
            'date'  => '2021-07-22',
            'result' => 'fail',
            'attempt'   => '1',
        ]);




    }
}
