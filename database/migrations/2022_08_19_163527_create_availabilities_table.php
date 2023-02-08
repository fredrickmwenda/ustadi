<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAvailabilitiesTable.
 */
class CreateAvailabilitiesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('availabilities', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('type'); //weekend ama weekdays
			$table->unsignedBigInteger('mentor_id');
			$table->foreign('mentor_id')->references('id')->on('mentors');
			$table->json('times_available');
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
		Schema::drop('availabilities');
	}
}
