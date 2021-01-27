<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityUserVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_user_vehicles', function (Blueprint $table) {
            $table->id();
            $table->char('communityUserVehicleId')->unique();
            $table->char('communityId');
            $table->foreign('communityId')->references('communityId')->on('communities');
            $table->char('username');
            $table->foreign('username')->references('username')->on('community_vehicle_users');
            $table->string('vehicleBrand');
            $table->string('vehicleModel');
            $table->string('vehicleColor');
            $table->string('plateNumber');
            $table->string('vehicleRegNum')->nullable();
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
        Schema::dropIfExists('community_user_vehicles');
    }
}
