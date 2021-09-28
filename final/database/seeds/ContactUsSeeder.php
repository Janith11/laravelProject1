<?php

use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_us')->insert([
            'name' => 'dfs fdsfd',
            'email' => 'dfdt@gmail.com',
            'contactno' => '0711111111',
            'hometown'=>'Test',
            'message'=>'Hello?.',
            'created_at' => '2021-05-01 22:56:36',
            'updated_at'=>'2021-05-01 22:56:36',
        ]);

        DB::table('contact_us')->insert([
            'name' => 'Pasan Ranathunga',
            'email' => 'pasanrana285@gmail.com',
            'contactno' => '0758425862',
            'hometown'=>'Warakapola',
            'message'=>'I am 17 years old. Can I get license? Thank you.',
            'created_at' => '2021-06-01 22:56:36',
            'updated_at'=>'2021-06-01 22:56:36',
        ]);

        DB::table('contact_us')->insert([
            'name' => 'Sachinthaka Bandara',
            'email' => 'bandarasachi@gmail.com',
            'contactno' => '0786547852',
            'hometown'=>'Kuruwita',
            'message'=>'How should I register as a student? Thank you.',
            'created_at' => '2021-07-01 22:56:36',
            'updated_at'=>'2021-07-01 22:56:36',
        ]);

        DB::table('contact_us')->insert([
            'name' => 'Nipun Sandeepa',
            'email' => 'nipunsandeepa87@gmail.com',
            'contactno' => '0715478954',
            'hometown'=>'Minneriya',
            'message'=>'How to get heavy vehicle license? Thank you.',
            'created_at' => '2021-07-20 22:56:36',
            'updated_at'=>'2021-07-20 22:56:36',
        ]);

        DB::table('contact_us')->insert([
            'name' => 'Thiyanga Nimesha',
            'email' => 'thiyanganimesha55@gmail.com',
            'contactno' => '0726578545',
            'hometown'=>'Panadura',
            'message'=>'Can I get my driving license after my broken leg?',
            'created_at' => '2021-08-01 22:56:36',
            'updated_at'=>'2021-08-01 22:56:36',
        ]);

        DB::table('contact_us')->insert([
            'name' => 'Mevan Madushan',
            'email' => 'mevanmadushan@gmail.com',
            'contactno' => '0765489560',
            'hometown'=>'Galewela',
            'message'=>'My request is not still not accepted. Please accept it. Thank you.',
            'created_at' => '2021-08-20 22:56:36',
            'updated_at'=>'2021-08-20 22:56:36',
        ]);

        DB::table('contact_us')->insert([
            'name' => 'Sandeepa lakshan',
            'email' => 'sandeepalakshan13@gmail.com',
            'contactno' => '0769854752',
            'hometown'=>'Payagala',
            'message'=>'I sent you a email. But it is not workig?',
            'created_at' => '2021-09-20 22:56:36',
            'updated_at'=>'2021-09-09 22:56:36',
        ]);
    }
}
