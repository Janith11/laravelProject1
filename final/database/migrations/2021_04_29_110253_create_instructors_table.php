<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role_id')->default(2);
            $table->string('frist_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('nic_number')->unique();
            $table->string('email')->unique();
            $table->string('pasword')->default(bcrypt('12345678'));
            $table->string('gender');
            $table->string('contact_number');
            $table->string('address_number');
            $table->string('address_lineone');
            $table->string('address_linetwo');
            $table->string('vehicle_category');
            $table->string('languages');
            $table->date('dob');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instructors');
    }
}
