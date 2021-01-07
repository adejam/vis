<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommunityVehicles extends Migration
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
            $table->char('communityId');
            $table->foreign('communityId')->references('communityId')->on('communities');
            $table->bigInteger('userId')->nullable()->unsigned();
            $table->foreign('userId')->references('id')->on('users');
            $table->char('userVehicleId');
            $table->foreign('userVehicleId')->references('userVehicleId')->on('user_vehicles');
            $table->string('locationInCommunity');
            $table->boolean('verified');
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
