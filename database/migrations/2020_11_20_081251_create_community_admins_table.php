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
            $table->bigInteger('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');
            $table->char('communityId');
            $table->foreign('communityId')->references('communityId')->on('communities');
            $table->boolean('verifyUser');
            $table->boolean('editUserVehicle');
            $table->boolean('removeUser');
            $table->boolean('addAdmin');
            $table->boolean('addAdminRoles');
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
