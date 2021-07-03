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
            'company_name' => 'test_name',
            'contact_number' => '0712345678',
            'email' => 'test@gmail.com',
            'logo' => 'logo.jpg',
            'address_no' => '1',
            'address_lineone' => 'line one',
            'address_linetwo' => 'line two'
        ]);
    }
}
