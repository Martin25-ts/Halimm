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
            $table->bigIncrements('user_id');
            $table->string('front_name',500);
            $table->string('last_name',255);
            $table->string('email',50)->unique();
            $table->string('password',255);
            $table->string('user_phone',20)->unique();
            $table->string('api_token',1000)->unique()->nullable()->default(null);
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('status_user_id');

            // $table->timestamp('email_verified_at')->nullable();
            $table->string('remember_token',255)->nullable();
            $table->timestamps();


            $table->foreign('status_user_id')->references('status_user_id')->on('ms_statuses_user')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('role_id')->references('role_id')->on('ms_roles')->onDelete('cascade')->onUpdate('cascade');
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
};
