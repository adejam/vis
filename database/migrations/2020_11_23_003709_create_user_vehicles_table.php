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
            $table->foreignId('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');
            $table->integer('timesVerified')->unsigned();
            $table->string('vehicleBrand');
            $table->string('vehicleModel');
            $table->string('vehicleColor');
            $table->string('plateNumber')->unique();
            $table->string('driverLicenseId')->unique()->nullable();
            $table->string('vehicleRegNum')->unique()->nullable();
            $table->string('vehicleRegState')->nullable();
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
