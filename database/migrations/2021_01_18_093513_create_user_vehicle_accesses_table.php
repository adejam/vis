<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVehicleAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_vehicle_accesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId')->nullable()->index();
            $table->foreign('userId')->references('id')->on('users');
            $table->char('userVehicleId');
            $table->foreign('userVehicleId')->references('userVehicleId')->on('user_vehicles');
            $table->char('communityId');
            $table->foreign('communityId')->references('communityId')->on('communities');
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
        Schema::dropIfExists('user_vehicle_accesses');
    }
}
