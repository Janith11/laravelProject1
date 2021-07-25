<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salaries')->insert([
            'user_id' => '2',
            'date' => '2021/04/30',
            'amount' => '31800'
        ]);

        DB::table('salaries')->insert([
            'user_id' => '2',
            'date' => '2021/05/31',
            'amount' => '30000'
        ]);

        DB::table('salaries')->insert([
            'user_id' => '2',
            'date' => '2021/06/30',
            'amount' => '35600'
        ]);
    }
}
