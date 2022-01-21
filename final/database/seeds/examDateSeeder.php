<?php

use Illuminate\Database\Seeder;

class examDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exam__dates')->insert([
            'exam_type' => 'Theory',
            'exam_date' => '2021-12-30',
            'exam_start_time' => '09:00:00',
            'exam_end_time' => '11:00:00',
            'vehicle_category'=>'',
            'created_at' => '2021-12-11 22:56:36',
            'updated_at'=>'2021-12-11 22:56:36'
        ]);

        DB::table('exam__dates')->insert([
            'exam_type' => 'Practical',
            'exam_date' => '2021-12-21',
            'exam_start_time' => '09:00:00',
            'exam_end_time' => '12:00:00',
            'vehicle_category'=>'A',
            'created_at' => '2021-12-11 22:56:36',
            'updated_at'=>'2021-12-11 22:56:36'
        ]);

        DB::table('exam__dates')->insert([
            'exam_type' => 'Practical',
            'exam_date' => '2021-12-28',
            'exam_start_time' => '09:00:00',
            'exam_end_time' => '12:00:00',
            'vehicle_category'=>'C',
            'created_at' => '2021-12-11 22:56:36',
            'updated_at'=>'2021-12-11 22:56:36'
        ]);

        DB::table('exam__dates')->insert([
            'exam_type' => 'Practical',
            'exam_date' => '2021-12-30',
            'exam_start_time' => '09:00:00',
            'exam_end_time' => '12:00:00',
            'vehicle_category'=>'C1',
            'created_at' => '2021-12-11 22:56:36',
            'updated_at'=>'2021-12-11 22:56:36'
        ]);
    }
}
