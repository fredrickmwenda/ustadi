<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateActivityTypesTable.
 */
class CreateActivityTypesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activity_types', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('name'); //Presentation. meeting, debates etc
			$table->string('description'); //description of the activity type
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
		Schema::drop('activity_types');
	}
}
