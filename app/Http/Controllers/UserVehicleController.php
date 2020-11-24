<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserVehicle;
use App\Models\CommunityVehicle;
use Webpatser\Uuid\Uuid;
use Illuminate\Validation\Rule;
use Auth;
use DB;

class UserVehicleController extends Controller
{
    public function index()
    {
        $userVehicles = DB::table('user_vehicles')
            ->select(
                'userVehicleId',
                'timesVerified',
                'vehicleBrand',
                'vehicleModel',
                'vehicleColor',
                'driverLicenseId',
                'vehicleRegNum',
                'vehicleRegState',
                'plateNumber'
            )->where('userId', '=', Auth::id())->get();
        return view('user.user-vehicles.myVehicles')->with('userVehicles', $userVehicles);
    }

    public static function getCurrentUserVehicleCommunity($userVehicleId)
    {
        $communityVehicle=DB::table('community_vehicles')
        ->select(
            'communityId',
        )->where('userVehicleId', '=', $userVehicleId)->first();
        // dd($communityVehicle->communityId);
        // return $communityVehicle;
        $communities =  DB::table('communities')
        ->select(
            'communityName',
            'communityId',
        )->where('communityId', '=', $communityVehicle->communityId)->get();
        // dd($communities);
        return $communities;
    }

    public function addVehicle(Request $request)
    {
        $this->validate(
            $request,
            [
            'vehicleBrand' => ['required', 'string', 'max:255'],
            'vehicleModel' => ['required', 'string', 'max:255'],
            'vehicleColor' => ['required', 'string', 'max:255'],
            'driverLicenseId' => ['required', 'string', 'max:255', 'unique:user_vehicles'],
            'vehicleRegNum' => ['required', 'string', 'max:255', 'unique:user_vehicles'],
            'vehicleRegState' => ['required', 'string', 'max:255'],
            'plateNumber' => ['required', 'string', 'max:255', 'unique:user_vehicles'],
            ]
        );
        $userVehicleId = utf8_encode(Uuid::generate());
        $vehicle = new UserVehicle;
        $vehicle->userVehicleId = $userVehicleId;
        $vehicle->userId = Auth::user()->id;
        $vehicle->timesVerified = 0;
        $vehicle->vehicleBrand = $request->vehicleBrand;
        $vehicle->vehicleModel = $request->vehicleModel;
        $vehicle->vehicleColor = $request->vehicleColor;
        $vehicle->driverLicenseId = $request->driverLicenseId;
        $vehicle->vehicleRegNum = $request->vehicleRegNum;
        $vehicle->vehicleRegState = $request->vehicleRegState;
        $vehicle->plateNumber = $request->plateNumber;
        $vehicle->save();
                
        return back()->with('success', ''.$vehicle->vehicleBrand.' successfully created!');
    }

    public function updateVehicle(Request $request)
    {
        $userVehicle = UserVehicle::where('userVehicleId', '=', $request->userVehicleId)->firstOrFail();
        $this->validate(
            $request,
            [
            'vehicleBrand' => ['required', 'string', 'max:255'],
            'vehicleModel' => ['required', 'string', 'max:255'],
            'vehicleColor' => ['required', 'string', 'max:255'],
            'driverLicenseId' => ['required', 'string', 'max:255', Rule::unique('user_vehicles')->ignore($userVehicle->id)],
            'vehicleRegNum' => ['required', 'string', 'max:255', Rule::unique('user_vehicles')->ignore($userVehicle->id)],
            'vehicleRegState' => ['required', 'string', 'max:255'],
            'plateNumber' => ['required', 'string', 'max:255', Rule::unique('user_vehicles')->ignore($userVehicle->id)],
            ]
        );

        $userVehicle->vehicleColor = $request->vehicleColor;
        if ($userVehicle->timesVerified == 1) {
            $userVehicle->vehicleBrand = $request->vehicleBrand;
            $userVehicle->vehicleModel = $request->vehicleModel;
            $userVehicle->vehicleRegState = $request->vehicleRegState;
            $userVehicle->driverLicenseId = $request->driverLicenseId;
            $userVehicle->vehicleRegNum = $request->vehicleRegNum;
            $userVehicle->plateNumber = $request->plateNumber;
        }
        
        $userVehicle->save();

        return back()->with('success', ''.$userVehicle->vehicleBrand.' successfully Updated!');
    }

    public function deleteVehicle(Request $request, $id=null)
    {
        $userVehicleId = $request->userVehicleId ? $request->userVehicleId : $id;
        $vehicle = UserVehicle::where('userVehicleId', '=', $userVehicleId)->firstOrFail();
        $communityVehicle = CommunityVehicle::where('userId', '=', Auth::user()->id)->where('userVehicleId', '=', $userVehicleId)->get();
        foreach ($communityVehicle as $communityVehicle) {
            $communityVehicle->delete();
        }
        $vehicle->delete();
        return back()->with('success', 'Vehicle successfully Removed!');
    }

    public function joinCommunity(Request $request)
    {
        $this->validate(
            $request,
            [
            'locationInCommunity' => ['required', 'string', 'max:255'],
            ]
        );

        $community = DB::table('communities')->select(
            'communityName',
        )->where('communityId', '=', $request->communityId)->first();

        $vehicleExistInCommunity = DB::table('community_vehicles')->select(
            'communityVehicleId',
        )->where('userVehicleId', '=', $request->userVehicleId)->first();
        
        if (!$vehicleExistInCommunity) {
            $communityVehicleId = utf8_encode(Uuid::generate());
            $communityVehicle = new CommunityVehicle;
            $communityVehicle->communityVehicleId = $communityVehicleId;
            $communityVehicle->userId = Auth::user()->id;
            $communityVehicle->userVehicleId = $request->userVehicleId;
            $communityVehicle->communityId = $request->communityId;
            $communityVehicle->locationInCommunity = $request->locationInCommunity;
            $communityVehicle->verified = 0;
            $communityVehicle->save();
            return back()->with('success', 'Request to join'.$community->communityName.' community Successfully sent!');
        } else {
            return back()->with('error', 'This vehicle is already a part of '.$community->communityName.' community!');
        }
    }
}
