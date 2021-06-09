<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnerShedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_shedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->date('date');
            $table->string('color')->default('#90EE9');
            $table->string('textColor')->default('#222944');
            $table->time('time');
            $table->string('lesson_type');
            $table->string('instructor');
            $table->string('shedule_status')->default(1);
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
        Schema::dropIfExists('owner_shedules');
    }
}
