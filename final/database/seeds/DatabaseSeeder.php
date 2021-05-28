<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // class all seeders here
        $this->call([UsersTableSeeder::class,
                    RoleTableSeeder::class]);
    }
}
