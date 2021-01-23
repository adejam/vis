<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunityUserVehicle;
use App\Models\CommunityVehicleUser;
use App\Http\Controllers\CommunityAdminController;
use JD\Cloudder\Facades\Cloudder;
use Webpatser\Uuid\Uuid;
use Auth;
use DB;

class CommunityVehicleUserController extends Controller
{
    public function showUserVehicle($communityId, $username)
    {
        $community = CommunityAdminController::getCommunityWithAccess($communityId);
        $user = DB::table('community_vehicle_users')
            ->select(
                'name',
                'lastname',
                'user_phone',
                'username',
                'profile_photo_path',
                'locationInCommunity'
            )->where('communityId', '=', $communityId)
            ->where('username', '=', $username)->first();

        $vehicles = DB::table('community_user_vehicles')
            ->select(
                'communityUserVehicleId',
                'vehicleBrand',
                'vehicleModel',
                'vehicleColor',
                'driverLicenseId',
                'vehicleRegNum',
                'vehicleRegState',
                'plateNumber'
            )->where('username', '=', $username)->get();
            
        return view('user.my-community.communityUserVehicle')
            ->with('community', $community)
            ->with('user', $user)
            ->with('vehicles', $vehicles);
    }

    public function addUserAndVehicle(Request $request)
    {
        $this->validate(
            $request,
            [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'user_phone' => ['required', 'digits:11'],
            'photo' => ['required', 'image', 'max:1024'],
            'locationInCommunity' => ['required', 'string', 'max:255'],
            'vehicleBrand' => ['required', 'string', 'max:255'],
            'vehicleModel' => ['required', 'string', 'max:255'],
            'vehicleColor' => ['required', 'string', 'max:255'],
            'driverLicenseId' => ['nullable', 'string', 'max:255'],
            'vehicleRegNum' => ['nullable', 'string', 'max:255', 'unique:community_user_vehicles'],
            'vehicleRegState' => ['nullable', 'string', 'max:255'],
            'plateNumber' => ['required', 'string', 'max:255', 'unique:community_user_vehicles'],
            ]
        );

        $vehicleUser = new CommunityVehicleUser;
        $vehicleUser->communityId = $request->communityId;
        $vehicleUser->name = $request->name;
        $vehicleUser->lastname = $request->lastname;
        $vehicleUser->user_phone = $request->user_phone;
        $vehicleUser->locationInCommunity = $request->locationInCommunity;
        $vehicleUser->username = $request->name.$request->lastname.date('mdHis');

        $photo = $request->file('photo');
        $imagePath = $photo->getRealpath();
        Cloudder::upload($imagePath, null);
        $publicId = Cloudder::getPublicId();
        $imageUrl = Cloudder::show(
            $publicId,
            [
            'width' => 300,
            'height' => 300,
            ]
        );
        $vehicleUser->profile_photo_path = $imageUrl;
        $vehicleUser->profile_photo_public_id = $publicId;
        
        $communityUserVehicleId = utf8_encode(Uuid::generate());
        $userVehicle = new CommunityUserVehicle;
        $userVehicle->communityUserVehicleId = $communityUserVehicleId;
        $userVehicle->username = $vehicleUser->username;
        $userVehicle->vehicleBrand = $request->vehicleBrand;
        $userVehicle->vehicleModel = $request->vehicleModel;
        $userVehicle->vehicleColor = $request->vehicleColor;
        $userVehicle->driverLicenseId = $request->driverLicenseId;
        $userVehicle->vehicleRegNum = $request->vehicleRegNum;
        $userVehicle->vehicleRegState = $request->vehicleRegState;
        $userVehicle->plateNumber = $request->plateNumber;
        
        // dd($request);
        $vehicleUser->save();
        $userVehicle->save();
                
        return redirect('my-community/'.$vehicleUser->communityId.'/community-user-vehicles/'.$vehicleUser->username)
            ->with('success', ''.$userVehicle->vehicleBrand.' successfully created for '.$vehicleUser->name.'!');
    }
}
