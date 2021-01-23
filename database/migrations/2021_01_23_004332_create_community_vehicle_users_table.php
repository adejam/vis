<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityVehicleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_vehicle_users', function (Blueprint $table) {
            $table->id();
            $table->char('communityId');
            $table->foreign('communityId')->references('communityId')->on('communities');
            $table->string('name');
            $table->string('lastname');
            $table->string('username')->unique();
            $table->string('user_phone');
            $table->text('profile_photo_path')->nullable();
            $table->char('profile_photo_public_id')->nullable();
            $table->string('locationInCommunity');
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
        Schema::dropIfExists('community_vehicle_users');
    }
}
