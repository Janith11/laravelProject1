<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('student_progress')->insert([
            'shedule_id' => 1,
            'user_id' => 6,
            'category_code' => 'theory',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 1,
            'user_id' => 7,
            'category_code' => 'theory',
            'grade' => '1',
        ]);
        
        // 2
        DB::table('student_progress')->insert([
            'shedule_id' => 2,
            'user_id' => 6,
            'category_code' => 'A',
            'grade' => '3',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 2,
            'user_id' => 7,
            'category_code' => 'A',
            'grade' => '3',
        ]);
        
        // 3
        DB::table('student_progress')->insert([
            'shedule_id' => 3,
            'user_id' => 6,
            'category_code' => 'theory',
            'grade' => '1',
        ]);
        
        // 4
        DB::table('student_progress')->insert([
            'shedule_id' => 4,
            'user_id' => 6,
            'category_code' => 'A',
            'grade' => '3',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 4,
            'user_id' => 7,
            'category_code' => 'A',
            'grade' => '3',
        ]);
        
        // 5
        DB::table('student_progress')->insert([
            'shedule_id' => 5,
            'user_id' => 7,
            'category_code' => 'B1',
            'grade' => '3',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 5,
            'user_id' => 8,
            'category_code' => 'B1',
            'grade' => '3',
        ]);
        
        // 6
        DB::table('student_progress')->insert([
            'shedule_id' => 6,
            'user_id' => 8,
            'category_code' => 'C1',
            'grade' => '3',
        ]);
        
        // 7
        DB::table('student_progress')->insert([
            'shedule_id' => 7,
            'user_id' => 6,
            'category_code' => 'A',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 7,
            'user_id' => 7,
            'category_code' => 'A',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 7,
            'user_id' => 8,
            'category_code' => 'A',
            'grade' => '2',
        ]);
        
        // 8
        DB::table('student_progress')->insert([
            'shedule_id' => 8,
            'user_id' => 7,
            'category_code' => 'B1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 8,
            'user_id' => 8,
            'category_code' => 'B1',
            'grade' => '2',
        ]);
        
        // 9
        DB::table('student_progress')->insert([
            'shedule_id' => 9,
            'user_id' => 6,
            'category_code' => 'A',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 9,
            'user_id' => 7,
            'category_code' => 'A',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 9,
            'user_id' => 8,
            'category_code' => 'A',
            'grade' => '2',
        ]);
        
        // 10
        DB::table('student_progress')->insert([
            'shedule_id' => 10,
            'user_id' => 7,
            'category_code' => 'B1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 10,
            'user_id' => 8,
            'category_code' => 'B1',
            'grade' => '2',
        ]);
        
        // 11
        DB::table('student_progress')->insert([
            'shedule_id' => 11,
            'user_id' => 8,
            'category_code' => 'C1',
            'grade' => '2',
        ]);
        
        // 12
        DB::table('student_progress')->insert([
            'shedule_id' => 12,
            'user_id' => 7,
            'category_code' => 'C1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 12,
            'user_id' => 8,
            'category_code' => 'C1',
            'grade' => '2',
        ]);
        
        // 13
        DB::table('student_progress')->insert([
            'shedule_id' => 13,
            'user_id' => 9,
            'category_code' => 'theory',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 13,
            'user_id' => 10,
            'category_code' => 'theory',
            'grade' => '1',
        ]);
        
        // 14
        DB::table('student_progress')->insert([
            'shedule_id' => 14,
            'user_id' => 7,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 14,
            'user_id' => 8,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        
        // 15
        DB::table('student_progress')->insert([
            'shedule_id' => 15,
            'user_id' => 8,
            'category_code' => 'B1',
            'grade' => '3',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 15,
            'user_id' => 9,
            'category_code' => 'B1',
            'grade' => '3',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 15,
            'user_id' => 10,
            'category_code' => 'B1',
            'grade' => '3',
        ]);
        
        // 16
        DB::table('student_progress')->insert([
            'shedule_id' => 16,
            'user_id' => 8,
            'category_code' => 'B1',
            'grade' => '3',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 16,
            'user_id' => 9,
            'category_code' => 'B1',
            'grade' => '3',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 16,
            'user_id' => 10,
            'category_code' => 'B1',
            'grade' => '3',
        ]);
        
        // 17
        DB::table('student_progress')->insert([
            'shedule_id' => 17,
            'user_id' => 8,
            'category_code' => 'C1',
            'grade' => '3',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 17,
            'user_id' => 9,
            'category_code' => 'C1',
            'grade' => '3',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 17,
            'user_id' => 10,
            'category_code' => 'C1',
            'grade' => '3',
        ]);
        
        // 18
        DB::table('student_progress')->insert([
            'shedule_id' => 18,
            'user_id' => 8,
            'category_code' => 'B1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 18,
            'user_id' => 9,
            'category_code' => 'B1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 18,
            'user_id' => 10,
            'category_code' => 'B1',
            'grade' => '2',
        ]);
        
        // 19
        DB::table('student_progress')->insert([
            'shedule_id' => 19,
            'user_id' => 8,
            'category_code' => 'B1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 19,
            'user_id' => 9,
            'category_code' => 'B1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 19,
            'user_id' => 10,
            'category_code' => 'B1',
            'grade' => '2',
        ]);
        
        // 20
        DB::table('student_progress')->insert([
            'shedule_id' => 20,
            'user_id' => 11,
            'category_code' => 'theory',
            'grade' => '1',
        ]);
        
        // 21
        DB::table('student_progress')->insert([
            'shedule_id' => 21,
            'user_id' => 8,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 21,
            'user_id' => 9,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 21,
            'user_id' => 10,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        
        // 22
        DB::table('student_progress')->insert([
            'shedule_id' => 22,
            'user_id' => 12,
            'category_code' => 'theory',
            'grade' => '1',
        ]);
        
        // 23
        DB::table('student_progress')->insert([
            'shedule_id' => 23,
            'user_id' => 9,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 23,
            'user_id' => 10,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 23,
            'user_id' => 11,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        
        // 24
        DB::table('student_progress')->insert([
            'shedule_id' => 24,
            'user_id' => 9,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 24,
            'user_id' => 10,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 24,
            'user_id' => 11,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 24,
            'user_id' => 12,
            'category_code' => 'A',
            'grade' => '3',
        ]);
        
        // 25
        DB::table('student_progress')->insert([
            'shedule_id' => 25,
            'user_id' => 8,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 25,
            'user_id' => 9,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 25,
            'user_id' => 10,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 25,
            'user_id' => 11,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 25,
            'user_id' => 12,
            'category_code' => 'A',
            'grade' => '3',
        ]);
        
        // 26
        DB::table('student_progress')->insert([
            'shedule_id' => 26,
            'user_id' => 8,
            'category_code' => 'B1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 26,
            'user_id' => 9,
            'category_code' => 'B1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 26,
            'user_id' => 10,
            'category_code' => 'B1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 26,
            'user_id' => 11,
            'category_code' => 'B1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 26,
            'user_id' => 12,
            'category_code' => 'B1',
            'grade' => '3',
        ]);
        
        // 27
        DB::table('student_progress')->insert([
            'shedule_id' => 27,
            'user_id' => 8,
            'category_code' => 'C1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 27,
            'user_id' => 9,
            'category_code' => 'C1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 27,
            'user_id' => 10,
            'category_code' => 'C1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 27,
            'user_id' => 11,
            'category_code' => 'C1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 27,
            'user_id' => 12,
            'category_code' => 'C1',
            'grade' => '3',
        ]);
        
        // 28
        DB::table('student_progress')->insert([
            'shedule_id' => 28,
            'user_id' => 8,
            'category_code' => 'C1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 28,
            'user_id' => 9,
            'category_code' => 'C1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 28,
            'user_id' => 10,
            'category_code' => 'C1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 28,
            'user_id' => 12,
            'category_code' => 'C1',
            'grade' => '3',
        ]);
        
        // 29
        DB::table('student_progress')->insert([
            'shedule_id' => 29,
            'user_id' => 9,
            'category_code' => 'B1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 29,
            'user_id' => 10,
            'category_code' => 'B1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 29,
            'user_id' => 11,
            'category_code' => 'B1',
            'grade' => '2',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 29,
            'user_id' => 12,
            'category_code' => 'B1',
            'grade' => '2',
        ]);
        
        // 30
        DB::table('student_progress')->insert([
            'shedule_id' => 30,
            'user_id' => 9,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 30,
            'user_id' => 10,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 30,
            'user_id' => 11,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 30,
            'user_id' => 12,
            'category_code' => 'A',
            'grade' => '2',
        ]);
        
        // 31
        DB::table('student_progress')->insert([
            'shedule_id' => 31,
            'user_id' => 9,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 31,
            'user_id' => 10,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 31,
            'user_id' => 12,
            'category_code' => 'A',
            'grade' => '2',
        ]);
        
        // 32
        DB::table('student_progress')->insert([
            'shedule_id' => 32,
            'user_id' => 9,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 32,
            'user_id' => 10,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 32,
            'user_id' => 11,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 32,
            'user_id' => 12,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        
        // 33
        DB::table('student_progress')->insert([
            'shedule_id' => 33,
            'user_id' => 9,
            'category_code' => 'C1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 33,
            'user_id' => 10,
            'category_code' => 'C1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 33,
            'user_id' => 11,
            'category_code' => 'C1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 33,
            'user_id' => 12,
            'category_code' => 'C1',
            'grade' => '1',
        ]);
        
        // 34
        DB::table('student_progress')->insert([
            'shedule_id' => 34,
            'user_id' => 9,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 34,
            'user_id' => 10,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 34,
            'user_id' => 11,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 34,
            'user_id' => 12,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        
        // 35
        DB::table('student_progress')->insert([
            'shedule_id' => 35,
            'user_id' => 9,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 35,
            'user_id' => 10,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 35,
            'user_id' => 12,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        
        // 36
        DB::table('student_progress')->insert([
            'shedule_id' => 36,
            'user_id' => 9,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 36,
            'user_id' => 10,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 36,
            'user_id' => 11,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 36,
            'user_id' => 12,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        
        // 37
        DB::table('student_progress')->insert([
            'shedule_id' => 37,
            'user_id' => 9,
            'category_code' => 'C1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 37,
            'user_id' => 10,
            'category_code' => 'C1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 37,
            'user_id' => 12,
            'category_code' => 'C1',
            'grade' => '1',
        ]);
        
        // 38
        DB::table('student_progress')->insert([
            'shedule_id' => 38,
            'user_id' => 9,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 38,
            'user_id' => 10,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 38,
            'user_id' => 11,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 38,
            'user_id' => 12,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        
        // 39
        DB::table('student_progress')->insert([
            'shedule_id' => 39,
            'user_id' => 9,
            'category_code' => 'C1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 39,
            'user_id' => 10,
            'category_code' => 'C1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 39,
            'user_id' => 12,
            'category_code' => 'C1',
            'grade' => '1',
        ]);
        
        // 40
        DB::table('student_progress')->insert([
            'shedule_id' => 40,
            'user_id' => 13,
            'category_code' => 'theory',
            'grade' => '1',
        ]);
        
        // 41
        DB::table('student_progress')->insert([
            'shedule_id' => 41,
            'user_id' => 11,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 41,
            'user_id' => 12,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        
        // 42
        DB::table('student_progress')->insert([
            'shedule_id' => 42,
            'user_id' => 10,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 42,
            'user_id' => 11,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 42,
            'user_id' => 12,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 42,
            'user_id' => 13,
            'category_code' => 'A',
            'grade' => '3',
        ]);
        
        // 43
        DB::table('student_progress')->insert([
            'shedule_id' => 43,
            'user_id' => 11,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 43,
            'user_id' => 13,
            'category_code' => 'A',
            'grade' => '3',
        ]);
        
        // 44
        DB::table('student_progress')->insert([
            'shedule_id' => 44,
            'user_id' => 10,
            'category_code' => 'C1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 44,
            'user_id' => 12,
            'category_code' => 'C1',
            'grade' => '1',
        ]);
        
        // 45
        DB::table('student_progress')->insert([
            'shedule_id' => 45,
            'user_id' => 10,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 45,
            'user_id' => 11,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 45,
            'user_id' => 12,
            'category_code' => 'B1',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 45,
            'user_id' => 13,
            'category_code' => 'B1',
            'grade' => '3',
        ]);
        
        // 46
        DB::table('student_progress')->insert([
            'shedule_id' => 46,
            'user_id' => 10,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 46,
            'user_id' => 11,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 46,
            'user_id' => 12,
            'category_code' => 'A',
            'grade' => '1',
        ]);
        DB::table('student_progress')->insert([
            'shedule_id' => 46,
            'user_id' => 13,
            'category_code' => 'A',
            'grade' => '2',
        ]);
        
    }
}
