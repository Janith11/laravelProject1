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
            'category_code' => 'A',
            'name' => 'bike',
            'transmission'=>'automanual',
        ]);

        DB::table('vehicle_categories')->insert([
            'category_code' => 'B1',
            'name' => 'three weel',
            'transmission'=>'manual',
        ]);

        DB::table('vehicle_categories')->insert([
            'category_code' => 'C1',
            'name' => 'dual purposes',
            'transmission'=>'automanual',
        ]);

        DB::table('vehicle_categories')->insert([
            'category_code' => 'C',
            'name' => 'heavy vehical',
            'transmission'=>'manual',
        ]);
    }
}
