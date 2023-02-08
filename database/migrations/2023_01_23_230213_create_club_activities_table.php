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
        Schema::create('club_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('activities_name');
			$table->string('description');
			$table->unsignedBigInteger('club_id');
			$table->foreign('club_id')->references('id')->on('clubs');
            $table->integer('activity_type_id')->nullable();
			// $table->unsignedBigInteger('activity_type_id');
			// $table->foreign('activity_type_id')->references('id')->on('activity_types');
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
        Schema::dropIfExists('club_activities');
    }
};
