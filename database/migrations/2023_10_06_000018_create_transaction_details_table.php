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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->bigIncrements('detial_id');
            $table->unsignedBigInteger('transaction_id');
            $table->integer('duration');
            $table->unsignedBigInteger('locker_id');
            $table->integer('locker_potition');
            $table->timestamps();

            $table->foreign('transaction_id')->references('transaction_id')->on('transactions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('locker_id')->references('locker_id')->on('ms_lockers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
};
