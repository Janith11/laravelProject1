<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instructors all instructors are tstatus training
        DB::table('student_categories')->insert([
            'user_id' => '2',
            'category' => 'A',
            'tstatus' => 'Training',
            'transmission' => 'Auto',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '2',
            'category' => 'B1',
            'tstatus' => 'Training',
            'transmission' => 'Auto',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '2',
            'category' => 'C1',
            'tstatus' => 'Training',
            'transmission' => 'Auto',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '2',
            'category' => 'C',
            'tstatus' => 'Training',
            'transmission' => 'Manual',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '3',
            'category' => 'A',
            'tstatus' => 'Training',
            'transmission' => 'Auto',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '4',
            'category' => 'A',
            'tstatus' => 'Training',
            'transmission' => 'Auto',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '5',
            'category' => 'A',
            'tstatus' => 'Training',
            'transmission' => 'Auto',
        ]);


        //students
        DB::table('student_categories')->insert([
            'user_id' => '6',
            'category' => 'A',
            'tstatus' => 'Training',
            'transmission' => 'Auto',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '7',
            'category' => 'A',
            'tstatus' => 'Training',
            'transmission' => 'Auto',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '7',
            'category' => 'B1',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '8',
            'category' => 'A',
            'tstatus' => 'Training',
            'transmission' => 'Auto',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '8',
            'category' => 'B1',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '8',
            'category' => 'C1',
            'tstatus' => 'Training',
            'transmission' => 'Manual',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '9',
            'category' => 'A',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '9',
            'category' => 'B1',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '9',
            'category' => 'C1',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '10',
            'category' => 'A',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '10',
            'category' => 'B1',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '10',
            'category' => 'C1',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '11',
            'category' => 'A',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '11',
            'category' => 'C1',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '12',
            'category' => 'A',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '12',
            'category' => 'B1',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '12',
            'category' => 'C1',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '13',
            'category' => 'A',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '13',
            'category' => 'C1',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);


        // candiadtes
        DB::table('student_categories')->insert([
            'user_id' => '14',
            'category' => 'C1',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '15',
            'category' => 'C1',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '16',
            'category' => 'C1',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '17',
            'category' => 'C1',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
    }
}
