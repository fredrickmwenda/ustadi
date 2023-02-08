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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            // $table->integer('role')->nullable();
            $table->enum('role', ['mentor', 'matron','coordinator', 'admin', 'user'])->default('user');
            $table->string('phone')->nullable();
            $table->integer('role_id');
            // $table->enum('gender', ['male', 'female', 'other']);
            $table->timestamp('email_verified_at')->nullable();
            //profile picture
            $table->string('profile_picture')->nullable();
            $table->string('password');
            $table->timestamp('last_seen')->nullable();
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }

  //use strftime('%m', requests.created_at) AS month,
    // SELECT Count(requests.id) AS count_of_id,  substr('JanFebMarAprMayJunJulAugSepOctNovDec', 1 + 3 * strftime('%m', requests.created_at), -3) AS requests_created_at FROM requests GROUP BY strftime('%m', requests.created_at) ORDER BY strftime('%m', requests.created_at) ASC
};
