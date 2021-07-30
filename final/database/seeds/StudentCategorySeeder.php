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
            'user_id' => '3',
            'category' => 'A',
            'tstatus' => 'Training',
            'transmission' => 'Auto',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '4',
            'category' => 'B1',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '4',
            'category' => 'A',
            'tstatus' => 'Training',
            'transmission' => 'Auto',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '4',
            'category' => 'B1',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '4',
            'category' => 'C1',
            'tstatus' => 'Training',
            'transmission' => 'Manual',
        ]);
        DB::table('student_categories')->insert([
            'user_id' => '4',
            'category' => 'C',
            'tstatus' => 'Without Training',
            'transmission' => '3',
        ]);
    }
}
