<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateResourcesTable.
 */
class CreateResourcesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resources', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('name'); // Material for nex weeks club presentation
			$table->string('description');
			//resource type: pdf, video, audio, image, text
			$table->enum('type', ['pdf', 'video', 'audio', 'image', 'text', 'book', 'link']);
			//if type is book, then this is  authr and release date
			$table->string('author')->nullable();
			$table->string('release_date')->nullable();
			$table->string('url');
			$table->unsignedBigInteger('from_id');
			$table->foreign('from_id')->references('id')->on('mentors');
			// $table->unsignedBigInteger('to_id');
			// $table->foreign('to_id')->references('id')->on('schools');
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
		Schema::drop('resources');
	}
}
