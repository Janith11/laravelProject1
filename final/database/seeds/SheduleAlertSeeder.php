<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SheduleAlertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('shedule_alerts')->insert([
            'shedule_id' => 1,
            'message' => "You Have To Participate for 'test one' Shedule on 2021/06/25 at 08:00 am. ",
        ]);

        DB::table('shedule_alerts')->insert([
            'shedule_id' => 2,
            'message' => "You Have To Participate for 'test two' Shedule on 2021/06/28 at 10:00 am. ",
        ]);

        DB::table('shedule_alerts')->insert([
            'shedule_id' => 3,
            'message' => "You Have To Participate for 'test three' Shedule on 2021/07/10 at 10:00 am. ",
        ]);

        DB::table('shedule_alerts')->insert([
            'shedule_id' => 4,
            'message' => "You Have To Participate for 'test four' Shedule on 2021/08/18 at 10:00 am. ",
        ]);
    }
}
