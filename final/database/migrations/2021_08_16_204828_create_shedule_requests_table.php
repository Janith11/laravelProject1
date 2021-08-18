<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSheduleRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shedule_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shedule_id');
            $table->integer('user_id');
            $table->integer('status');
            $table->integer('shedule_status');
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
        Schema::dropIfExists('shedule_requests');
    }
}
