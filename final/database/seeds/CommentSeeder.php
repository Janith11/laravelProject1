<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'user_id' => '6',
            'comment'  => 'Higly Recomended this driving school. They gave customer friendly service. Flexible charges',
            'stars'  => 4,
        ]);
        DB::table('comments')->insert([
            'user_id' => '7',
            'comment'  => 'Higly Recomended this driving school. They gave customer friendly service. Flexible charges',
            'stars'  => 5,
        ]);
    }
}
