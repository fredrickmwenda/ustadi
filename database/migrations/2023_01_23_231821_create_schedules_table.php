<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
			$table->bigIncrements('id');
            $table->string('title');
            $table->string('description')->nullable();
			$table->unsignedBigInteger('mentor_id');
			$table->foreign('mentor_id')->references('id')->on('mentors');
			$table->unsignedBigInteger('request_id');
			$table->foreign('request_id')->references('id')->on('requests');
            //start date and time store them together
			$table->dateTime('start');
            //end date and time store them together
			$table->dateTime('end');
            //logo if any
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('schedules');
    }
};
