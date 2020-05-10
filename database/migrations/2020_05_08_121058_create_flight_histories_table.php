<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('airline_id')->unsigned()->nullable();
            $table->foreign('airline_id')->references('id')->on('airlines')->onDelete('cascade');
            $table->bigInteger('destination_id')->unsigned()->nullable();
            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
            $table->enum('activity',['departure','arrival']);
            $table->date('date1');
            $table->time('time1');
            $table->date('date2');
            $table->time('time2');
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
        Schema::table('flight_histories', function (Blueprint $table) {
            $table->dropForeign(['airline_id']);
            $table->dropForeign(['destination_id']);
        });
        Schema::dropIfExists('flight_histories');
    }
}
