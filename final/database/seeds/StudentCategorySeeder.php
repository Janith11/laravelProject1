<?php

use Illuminate\Database\Seeder;

class StudentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_categories')->insert([
            'user_id' => '6',
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
            'user_id' => '7',
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
            'category' => 'C',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '10',
            'category' => 'C',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '11',
            'category' => 'C',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '12',
            'category' => 'C',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '13',
            'category' => 'C',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '14',
            'category' => 'C',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
    }
}
