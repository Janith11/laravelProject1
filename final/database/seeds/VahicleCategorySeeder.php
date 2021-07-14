<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VahicleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_categories')->insert([
            'category_code' => 'A1',
            'name' => 'Scooter (auto)',
            'base_type' => 'light_vehicle',
        ]);

        DB::table('vehicle_categories')->insert([
            'category_code' => 'A',
            'name' => 'Motor Bicycle (manual)',
            'base_type' => 'light_vehicle',
        ]);
    }
}
