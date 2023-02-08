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
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mentor_id');
            $table->foreign('mentor_id')->references('id')->on('mentors');		
            $table->unsignedBigInteger('school_id');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->unsignedBigInteger('school_club_activity_id');
            $table->foreign('school_club_activity_id')->references('id')->on('school_club_activities');
            // $table->foreign('club_activity_id')->references('id')->on('club_activities');
            $table->longText('details');
            $table->boolean('accepted')->default(false);
            //created_by
            $table->integer('created_by');
            //set proposed_date_time
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
        Schema::dropIfExists('requests');
    }
};
