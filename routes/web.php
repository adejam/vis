<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CommunityAdminController;
use App\Http\Controllers\UserVehicleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

Route::middleware(['auth:sanctum', 'verified'])->get(
    '/dashboard',
    function () {
        return view('dashboard');
    }
)->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(
    function () {
        Route::group(
            ['prefix' => '/my-community'],
            function () {
                Route::get("/", [CommunityController::class, 'index'])->name('community');
                Route::post("/add", [CommunityController::class, 'add'])->name('community.add');
                Route::post("/update", [CommunityController::class, 'update'])->name('community.update');
                Route::post("/delete", [CommunityController::class, 'delete'])->name('community.delete');
                Route::get("/{communityId}", [CommunityController::class, 'getMyCommunity'])->name('community.get');
                Route::post("/add-admin", [CommunityAdminController::class, 'add'])->name('community.admin.add');
                Route::post("/remove-admin", [CommunityAdminController::class, 'removeAdmin'])->name('community.admin.remove');
                Route::get("/{communityId}/vehicle-users", [CommunityAdminController::class, 'vehicleUsers'])->name('community.vehicle.users');
                Route::get("/{communityId}/vehicle-users/{username}", [CommunityAdminController::class, 'usersVehicle'])->name('community.users.vehicle');
                Route::post("/vehicle/user/remove-vehicle", [CommunityAdminController::class, 'removeUserVehicle'])->name('community.user.remove-vehicle');
                Route::get("/{communityId}/vehicle-users/registration-requests", [CommunityAdminController::class, 'registrationRequest'])->name('community.registration-requests');
            }
        );

        Route::group(
            ['prefix' => '/my-vehicles'],
            function () {
                Route::get("/", [UserVehicleController::class, 'index'])->name('vehicles');
                Route::post("/vehicle-add", [UserVehicleController::class, 'addVehicle'])->name('vehicle.add');
                Route::post("/vehicle-update", [UserVehicleController::class, 'updateVehicle'])->name('vehicle.update');
                Route::post("/vehicle-delete", [UserVehicleController::class, 'deleteVehicle'])->name('vehicle.delete');
                Route::post("/join-community", [UserVehicleController::class, 'joinCommunity'])->name('vehicle.community.join');
                Route::get("/{vehicleBrand}/{userVehicleId}/community/{communityName}/{communityId}", [UserVehicleController::class, 'showCommunity'])->name('vehicle.community.show');
                Route::post("/unjoin-community", [UserVehicleController::class, 'unjoinCommunity'])->name('vehicle.community.unjoin');
            }
        );
    }
);
