<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_vehicles', function (Blueprint $table) {
            $table->id();
            $table->char('communityVehicleId')->unique();
            $table->bigInteger('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');
            $table->char('communityId');
            $table->foreign('communityId')->references('communityId')->on('communities');
            $table->string('userPhone');
            $table->string('locationInCommunity');
            $table->string('vehicleBrand');
            $table->string('vehicleModel');
            $table->string('vehiceColor');
            $table->string('driverLicenseId');
            $table->string('vehicleRegNum');
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
        Schema::dropIfExists('community_vehicles');
    }
}
