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
        Schema::create('school_club_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('school_club_activity');
            $table->string('description');
            // set school_club_id as foreign key
            $table->unsignedBigInteger('school_club_id');
            $table->foreign('school_club_id')->references('id')->on('school_clubs');
            $table->integer('club_activity_id')->nullable();
            $table->integer('activity_type_id')->nullable();
            //proposed date and time
            $table->dateTime('proposed_date_time');
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
        Schema::dropIfExists('school_club_activities');
    }
};
