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
            'name' => 'threeweel',
            'transmission'=>'manual',
        ]);

        DB::table('vehicle_categories')->insert([
            'category_code' => 'C1',
            'name' => 'dualpurposes',
            'transmission'=>'automanual',
        ]);

        DB::table('vehicle_categories')->insert([
            'category_code' => 'C',
            'name' => 'heavyvehical',
            'transmission'=>'manual',
        ]);
    }
}
