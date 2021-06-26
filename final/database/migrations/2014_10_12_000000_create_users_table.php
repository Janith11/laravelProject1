<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role_id')->default(3); // here student role id is 3
            $table->string('f_name');
            $table->string('m_name');
            $table->string('l_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nic_number')->unique();
            $table->string('gender');
            $table->integer('contact_number');
            $table->date('dob');
            $table->string('address_no');
            $table->string('address_lineone');
            $table->string('address_linetwo');
            $table->string('profile_img')->default('default_profile.jpg
            ');
            $table->integer('status')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
