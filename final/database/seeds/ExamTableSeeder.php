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
            'exam_date_id'=>'1',
            'type'  => 'theory',
            'date'  => '2021-06-22',
            'result' => 'pass',
            'attempt'   => '1',
        ]);
        DB::table('exams')->insert([
            'user_id' => '6',
            'exam_date_id'=>'2',
            'type'  => 'practical',
            'date'  => '2021-07-22',
            'result' => 'fail',
            'attempt'   => '1',
        ]);

        DB::table('exams')->insert([
            'user_id' => '7',
            'exam_date_id'=>'3',
            'type'  => 'theory',
            'date'  => '2021-06-22',
            'result' => 'pass',
            'attempt'   => '1',
        ]);
        DB::table('exams')->insert([
            'user_id' => '7',
            'exam_date_id'=>'4',
            'type'  => 'practical',
            'date'  => '2021-07-22',
            'result' => 'fail',
            'attempt'   => '1',
        ]);

        DB::table('exams')->insert([
            'user_id' => '8',
            'exam_date_id'=>'1',
            'type'  => 'theory',
            'date'  => '2021-06-22',
            'result' => 'pass',
            'attempt'   => '1',
        ]);
        DB::table('exams')->insert([
            'user_id' => '8',
            'exam_date_id'=>'1',
            'type'  => 'practical',
            'date'  => '2021-07-22',
            'result' => 'fail',
            'attempt'   => '1',
        ]);

        DB::table('exams')->insert([
            'user_id' => '9',
            'exam_date_id'=>'1',
            'type'  => 'theory',
            'date'  => '2021-06-22',
            'result' => 'pass',
            'attempt'   => '1',
        ]);
        DB::table('exams')->insert([
            'user_id' => '9',
            'exam_date_id'=>'1',
            'type'  => 'practical',
            'date'  => '2021-07-22',
            'result' => 'fail',
            'attempt'   => '1',
        ]);

        DB::table('exams')->insert([
            'user_id' => '10',
            'exam_date_id'=>'1',
            'type'  => 'theory',
            'date'  => '2021-06-22',
            'result' => 'pass',
            'attempt'   => '1',
        ]);
        DB::table('exams')->insert([
            'user_id' => '10',
            'exam_date_id'=>'1',
            'type'  => 'practical',
            'date'  => '2021-07-22',
            'result' => 'fail',
            'attempt'   => '1',
        ]);




    }
}
