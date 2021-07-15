<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainingVehicleCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('training_vehicle_categories')->insert([
            'category_id' => 'A1',
            'user_id' => 3,
        ]);

        DB::table('training_vehicle_categories')->insert([
            'category_id' => 'A',
            'user_id' => 3,
        ]);
    }
}
