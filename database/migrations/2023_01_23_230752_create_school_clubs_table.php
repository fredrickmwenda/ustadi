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
        Schema::create('school_clubs', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('school_id');
			$table->foreign('school_id')->references('id')->on('schools');
			$table->unsignedBigInteger('club_id');
			$table->foreign('club_id')->references('id')->on('clubs');
			$table->unsignedBigInteger('approved_by')->nullable();
			$table->foreign('approved_by')->references('id')->on('matrons');
			$table->boolean('approved')->default(false);
			//amount of students in the club
			$table->integer('students_count')->default(0);
			//use deleted_at to deactivate a club
			$table->softDeletes();
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
        Schema::dropIfExists('school_clubs');
    }
};
