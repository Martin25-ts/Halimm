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
        Schema::create('ms_lockers', function (Blueprint $table) {
            $table->bigIncrements('locker_id');
            $table->string('locker_number',10);
            $table->unsignedBigInteger('status_locker_id');
            $table->unsignedBigInteger('location_id');
            $table->string('locker_size',10);
            $table->integer('status_door');
            $table->timestamps();


            $table->foreign('status_locker_id')->references('status_locker_id')->on('ms_status_lockers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('location_id')->references('location_id')->on('ms_locations')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_lockers');
    }
};
