<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_details')->insert([
            'company_name' => 'SHAN LEARNERS',
            'contact_number' => '0712345678',
            'email' => 'shanlearnersfirst.com',
            'logo' => 'logo.jpg',
            'address_no' => 'No 212',
            'address_lineone' => 'Kesbewa Road',
            'address_linetwo' => 'Piliyandala'
        ]);
    }
}
