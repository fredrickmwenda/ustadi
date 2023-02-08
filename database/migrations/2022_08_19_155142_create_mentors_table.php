<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMentorsTable.
 */
class CreateMentorsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mentors', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->json('availability')->nullable();
			// Can be both weekend and weekday or just one of them
            $table->json('specializations')->nullable();
			$table->integer('location_id');
			//mentor status: active, inactive, pending
			$table->enum('status', ['active', 'inactive', 'pending'])->default('pending');
			$table->enum('approval_status', ['approved', 'rejected', 'pending'])->default('pending');
			$table->integer('approved_by')->nullable();
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
		Schema::drop('mentors');
	}
}
