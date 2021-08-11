<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'message' => "<b>Hello Student&nbsp;</b><div>Welcome to over driving school !</div><div>We hope you will be a good driver. You can share your experience with us.</div><div><b>Thank You.&nbsp;&nbsp;</b></div>",
        ]);
    }
}
