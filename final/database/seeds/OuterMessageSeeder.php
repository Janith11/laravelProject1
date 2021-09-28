<?php

use Illuminate\Database\Seeder;

class OuterMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('outer_student_messages')->insert([
            'uid' => '14',
            'name' => 'Sujeewa Perera',
            'message' => 'I want to update my driving license, Three category. Thank you.',
            'created_at' => '2021-08-01 22:56:36',
            'updated_at'=>'2021-08-01 22:56:36',
        ]);
        DB::table('outer_student_messages')->insert([
            'uid' => '13',
            'name' => 'Asoka Peiris',
            'message' => 'I can not log in to the system. Please can you fix it?',
            'created_at' => '2021-08-01 22:56:36',
            'updated_at'=>'2021-08-01 22:56:36',
        ]);
        DB::table('outer_student_messages')->insert([
            'uid' => '12',
            'name' => 'Chamal Rajapakse',
            'message' => 'I want to update my driving license, Heavy Vehicle. Do you want my driving license number? Thank you.',
            'created_at' => '2021-08-01 22:56:36',
            'updated_at'=>'2021-08-01 22:56:36',
        ]);
    }
}
