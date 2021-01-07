<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_admins', function (Blueprint $table) {
            $table->id();
            $table->char('communityAdminId')->unique();
            $table->bigInteger('userId')->nullable()->unsigned();
            $table->foreign('userId')->references('id')->on('users');
            $table->char('communityId');
            $table->foreign('communityId')->references('communityId')->on('communities');
            $table->boolean('identifyVehicleUser');
            $table->boolean('verifyUser');
            $table->boolean('removeUserVehicle');
            $table->boolean('addAdmin');
            $table->boolean('removeAdmin');
            $table->boolean('editAdminRoles');
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
        Schema::dropIfExists('community_admins');
    }
}
