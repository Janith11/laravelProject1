<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expenses')->insert([
            'date' => '2021/07/01',
            'reson' => 'Garbage collection',
            'amount' => '200'
        ]);

        DB::table('expenses')->insert([
            'date' => '2021/07/10',
            'reson' => 'Vehicle Engine repaire',
            'amount' => '20000'
        ]);

        DB::table('expenses')->insert([
            'date' => '2021/07/15',
            'reson' => 'Tutorial printouts',
            'amount' => '100'
        ]);
    }
}
