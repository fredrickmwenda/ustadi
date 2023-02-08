<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSchoolsTable.
 */
class CreateSchoolsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schools', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('school_name');
			$table->integer('county_id');
			$table->string('phone');
			//school motto
			$table->text('motto');
			$table->string('email')->unique()->nullable();
			$table->boolean('approved')->default(false);
			$table->unsignedBigInteger('approved_by')->nullable();
			$table->foreign('approved_by')->references('id')->on('users');
			$table->string('approval_comments')->nullable();
			$table->enum('status', ['approved', 'pending', 'rejected'])->default('pending');
			$table->unsignedBigInteger('created_by');
			$table->foreign('created_by')->references('id')->on('users');
			//logo
			$table->string('logo')->nullable();
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
		Schema::drop('schools');
	}
}
