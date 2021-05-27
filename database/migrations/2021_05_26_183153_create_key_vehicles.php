<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeyVehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_vehicles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('key_id')->unsigned();
            $table->bigInteger('vehicle_id')->unsigned();

            $table->index('key_id');
            $table->index('vehicle_id');

            $table->foreign('key_id')->references('id')->on('keys');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('key_vehicles');
    }
}
