<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShedulingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sheduling_types')->insert([
            'type' => '1',
        ]);
    }
}
