<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CommunityAdminController;
use App\Http\Controllers\UserVehicleController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\UserVehicleAccessController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
Route::post('/contact-us/sendemail', [ContactUsController::class, 'send'])->name('contact-us.send');

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
                Route::get("/{communityId}/admins", [CommunityController::class, 'getMyCommunityAdmins'])->name('community.get.admins');
                Route::get("/{communityId}/settings", [CommunityController::class, 'getMyCommunitySettings'])->name('community.get.settings');
                Route::post("/add-admin", [CommunityAdminController::class, 'add'])->name('community.admin.add');
                Route::post("/update-admin", [CommunityAdminController::class, 'updateAdmin'])->name('community.admin.update');
                Route::post("/remove-admin", [CommunityAdminController::class, 'removeAdmin'])->name('community.admin.remove');
                Route::get("/{communityId}/all-vehicle-users", [CommunityAdminController::class, 'allVehicleUsers'])->name('community.vehicle.all-users');
                Route::get("/{communityId}/vehicle-users", [CommunityAdminController::class, 'vehicleUsers'])->name('community.vehicle.users');
                Route::get("/{communityId}/vehicle-users/{username}", [CommunityAdminController::class, 'usersVehicle'])->name('community.users.vehicle');
                Route::post("/vehicle/user/remove-vehicle", [CommunityAdminController::class, 'removeUserVehicle'])->name('community.user.remove-vehicle');
                Route::get("/{communityId}/registration-requests", [CommunityAdminController::class, 'registrationRequests'])->name('community.registration-requests');
                Route::get("/{communityId}/registration-requests/{username}", [CommunityAdminController::class, 'registrationRequestsVehicles'])->name('community.registration-requests.vehicles');
                Route::post("/vehicle/user/verify-user", [CommunityAdminController::class, 'verifyUser'])->name('community.user.verify-user');
                Route::get("/{communityId}/identify-vehicle-user", [CommunityAdminController::class, 'identifyVehicleUser'])->name('community.identify-vehicle-user');
            }
        );

        Route::group(
            ['prefix' => '/my-vehicles'],
            function () {
                Route::get("/", [UserVehicleController::class, 'index'])->name('vehicles');
                Route::get("/{userVehicleId}/{vehicleBrand}", [UserVehicleController::class, 'myVehicle'])->name('vehicle');
                Route::get("/search-communities", [UserVehicleController::class, 'searchCommunity'])->name('vehicles.community.search');
                Route::post("/vehicle-add", [UserVehicleController::class, 'addVehicle'])->name('vehicle.add');
                Route::post("/vehicle-update", [UserVehicleController::class, 'updateVehicle'])->name('vehicle.update');
                Route::post("/vehicle-delete", [UserVehicleController::class, 'deleteVehicle'])->name('vehicle.delete');
                Route::post("/join-community", [UserVehicleController::class, 'joinCommunity'])->name('vehicle.community.join');
                Route::get("/{vehicleBrand}/{userVehicleId}/community/{communityName}/{communityId}", [UserVehicleController::class, 'showCommunity'])->name('vehicle.community.show');
                Route::post("/unjoin-community", [UserVehicleController::class, 'unjoinCommunity'])->name('vehicle.community.unjoin');
                Route::post("/grant-remove-access", [UserVehicleAccessController::class, 'grantOrRemoveAccess'])->name('vehicle.access.grantOrRemove');
            }
        );
    }
);

Route::get(
    '/email/verify',
    function () {
        return view('auth.verify-email');
    }
)->middleware('auth')->name('verification.notice');

Route::get(
    '/email/verify/{id}/{hash}',
    function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/dashboard');
    }
)->middleware(['auth', 'signed'])->name('verification.verify');

Route::post(
    '/email/verification-notification',
    function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
)->middleware(['auth', 'throttle:6,1'])->name('verification.send');
