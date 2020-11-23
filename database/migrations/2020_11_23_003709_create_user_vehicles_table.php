<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_vehicles', function (Blueprint $table) {
            $table->id();
            $table->char('userVehicleId')->unique();
            $table->bigInteger('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');
            $table->string('userPhone');
            $table->string('timesVerified');
            $table->string('vehicleBrand');
            $table->string('vehicleModel');
            $table->string('vehiceColor');
            $table->string('driverLicenseId')->unique();
            $table->string('vehicleRegNum')->unique();
            $table->string('vehicleRegState');
            $table->string('plateNumber');
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
        Schema::dropIfExists('user_vehicles');
    }
}
