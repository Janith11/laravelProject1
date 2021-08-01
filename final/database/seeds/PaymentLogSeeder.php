<?php

use Illuminate\Database\Seeder;

class PaymentLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_logs')->insert([
            'user_id' => '6',
            'type' => 'debit',
            'description' => 'Total payment for the course',
            'amount' => '2000',
            'created_at'=>'2021-08-01 22:56:36',
            'updated_at'=>'2021-08-01 22:56:36'
        ]);
        DB::table('payment_logs')->insert([
            'user_id' => '6',
            'type' => 'debit',
            'description' => 'Total payment for the course',
            'amount' => '2000',
            'created_at'=>'2021-08-01 22:56:36',
            'updated_at'=>'2021-08-01 22:56:36'
        ]);
    }
}
