<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('airline_id')->unsigned();
            $table->foreign('airline_id')->references('id')->on('airlines')->onDelete('cascade');
            $table->bigInteger('from')->unsigned();
            $table->foreign('from')->references('id')->on('cities')->onDelete('cascade');
            $table->bigInteger('to')->unsigned();
            $table->foreign('to')->references('id')->on('cities')->onDelete('cascade');
            $table->dateTime('arrival');
            $table->dateTime('actual');
            $table->integer('delay')->nullable();
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
        Schema::table('flight_statuses', function (Blueprint $table) {
            $table->dropForeign(['airline_id']);
            $table->dropForeign(['from']);
            $table->dropForeign(['to']);
        });
        Schema::dropIfExists('flight_statuses');
    }
}
