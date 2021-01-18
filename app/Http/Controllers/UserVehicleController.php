<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserVehicle;
use App\Models\CommunityVehicle;
use App\Models\UserVehicleAccess;
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
                'vehicleBrand'
            )->where('userId', '=', Auth::id())->get();
        return view('user.user-vehicles.myVehicles')->with('userVehicles', $userVehicles);
    }

    public static function checkIfVehicleAlreadyRegistered($communityId, $userVehicleId)
    {
        return DB::table('community_vehicles')
            ->select(
                'verified',
                'communityVehicleId'
            )
            ->where('userId', '=', Auth::id())
            ->where('communityId', '=', $communityId)
            ->where('userVehicleId', '=', $userVehicleId)->first();
    }

    public function getCurrentUserVehicleCommunity($userVehicleId)
    {
        $communities = DB::table('community_vehicles')
            ->join('communities', 'communities.communityId', 'community_vehicles.communityId')
            ->select(
                'community_vehicles.communityId',
                'community_vehicles.verified',
                'communities.communityName'
            )
            ->where('community_vehicles.userVehicleId', '=', $userVehicleId)->get();
        return $communities;
    }

    public function myVehicle($userVehicleId, $vehicleBrand)
    {
        $vehicle = DB::table('user_vehicles')
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
            )->where('userId', '=', Auth::id())
            ->where('userVehicleId', '=', $userVehicleId)->first();

        $communities = $this->getCurrentUserVehicleCommunity($userVehicleId);
        return view('user.user-vehicles.myVehicle')
            ->with('vehicle', $vehicle)
            ->with('communities', $communities);
    }

    public function addVehicle(Request $request)
    {
        $this->validate(
            $request,
            [
            'vehicleBrand' => ['required', 'string', 'max:255'],
            'vehicleModel' => ['required', 'string', 'max:255'],
            'vehicleColor' => ['required', 'string', 'max:255'],
            'driverLicenseId' => ['nullable', 'string', 'max:255', 'unique:user_vehicles'],
            'vehicleRegNum' => ['nullable', 'string', 'max:255', 'unique:user_vehicles'],
            'vehicleRegState' => ['nullable', 'string', 'max:255'],
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
                
        return redirect('my-vehicles/'.$vehicle->userVehicleId.'/'.$vehicle->vehicleBrand)
            ->with('success', ''.$vehicle->vehicleBrand.' successfully created!');
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
            'driverLicenseId' => ['nullable', 'string', 'max:255', Rule::unique('user_vehicles')->ignore($userVehicle->id)],
            'vehicleRegNum' => ['nullable', 'string', 'max:255', Rule::unique('user_vehicles')->ignore($userVehicle->id)],
            'vehicleRegState' => ['nullable', 'string', 'max:255'],
            'plateNumber' => ['required', 'string', 'max:255', Rule::unique('user_vehicles')->ignore($userVehicle->id)],
            ]
        );

        if ($userVehicle->timesVerified < 1) {
            $userVehicle->vehicleColor = $request->vehicleColor;
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

    public function searchCommunity(Request $request)
    {
        $this->validate(
            $request,
            [
            'search' => ['required', 'string', 'max:255'],
            ]
        );

        $communities = DB::table('communities')
            ->select(
                'communityId',
                'communityName',
                'communityLocation',
                'aboutCommunity',
                'driverLicenseIdAccess',
                'vehicleRegNumAccess',
                'vehicleRegStateAccess'
            )
            ->where('communityName', 'like', '%'.$request->search.'%')
            ->orderBy('updated_at', 'desc')
            ->paginate(10)
            ->setpath('');
        
        $userVehicle = DB::table('user_vehicles')
            ->select(
                'vehicleBrand',
                'driverLicenseId',
                'vehicleRegNum',
                'vehicleRegState'
            )->where('userId', '=', Auth::id())
            ->where('userVehicleId', '=', $request->userVehicleId)->first();
        
        $communities->appends(
            array(
                'userVehicleId'=> $request->userVehicleId,
                'search'=> $request->search,
            )
        );

        return view('user.user-vehicles.searchCommunity')
            ->with(compact('communities'))
            ->with('userVehicleId', $request->userVehicleId)
            ->with('userVehicle', $userVehicle);
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
        return redirect('/my-vehicles')->with('success', 'Vehicle successfully Removed!');
    }

    public function joinCommunity(Request $request)
    {
        $userVehicle = UserVehicle::where('userVehicleId', '=', $request->userVehicleId)->firstOrFail();
        $this->validate(
            $request,
            [
            'locationInCommunity' => ['required', 'string', 'max:255'],
            'driverLicenseId' => ['nullable', 'string', 'max:255', Rule::unique('user_vehicles')->ignore($userVehicle->id)],
            'vehicleRegNum' => ['nullable', 'string', 'max:255', Rule::unique('user_vehicles')->ignore($userVehicle->id)],
            'vehicleRegState' => ['nullable', 'string', 'max:255'],
            ]
        );

        $community = DB::table('communities')->select(
            'communityName',
            'driverLicenseIdAccess',
            'vehicleRegNumAccess',
            'vehicleRegStateAccess'
        )->where('communityId', '=', $request->communityId)->first();

        $vehicleExistInCommunity = DB::table('community_vehicles')->select(
            'communityVehicleId',
        )->where('userVehicleId', '=', $request->userVehicleId)
            ->where('communityId', '=', $request->communityId)->first();
        
        if (!$vehicleExistInCommunity) {
            if ($request->driverLicenseId) {
                $userVehicle->driverLicenseId = $request->driverLicenseId;
            }

            if ($request->vehicleRegNum) {
                $userVehicle->vehicleRegNum = $request->vehicleRegNum;
            }

            if ($request->vehicleRegState) {
                $userVehicle->vehicleRegState = $request->vehicleRegState;
            }
            $userVehicle->save();

            $checkVehicleAccess = DB::table('user_vehicle_accesses')
                ->select('id')
                ->where('userId', '=', Auth::user()->id)
                ->where('userVehicleId', '=', $request->userVehicleId)
                ->where('communityId', '=', $request->communityId)->first();
            
            if (!$checkVehicleAccess && ($community->driverLicenseIdAccess || $community->vehicleRegNumAccess || $community->vehicleRegStateAccess)) {
                $UserVehicleAccess = new UserVehicleAccess;
                $UserVehicleAccess->userId = Auth::user()->id;
                $UserVehicleAccess->userVehicleId = $request->userVehicleId;
                $UserVehicleAccess->communityId = $request->communityId;
                $UserVehicleAccess->save();
            }

            $communityVehicleId = utf8_encode(Uuid::generate());
            $communityVehicle = new CommunityVehicle;
            $communityVehicle->communityVehicleId = $communityVehicleId;
            $communityVehicle->userId = Auth::user()->id;
            $communityVehicle->userVehicleId = $request->userVehicleId;
            $communityVehicle->communityId = $request->communityId;
            $communityVehicle->locationInCommunity = $request->locationInCommunity;
            $communityVehicle->verified = 0;
            $communityVehicle->save();
            return back()->with('success', 'Request to join '.$community->communityName.' community Successfully sent!');
        } else {
            return back()->with('error', 'This vehicle is already registered with '.$community->communityName.' community!');
        }
    }

    public function showCommunity($vehicleBrand, $userVehicleId, $communityName, $communityId)
    {
        $community = DB::table('communities')
            ->select('communityId', 'communityName', 'communityLocation', 'aboutCommunity', 'userId')
            ->where('communityId', '=', $communityId)->first();

        $communityAdmins = DB::table('community_admins')
            ->join('users', 'users.id', 'community_admins.userId')
            ->select('name', 'lastname', 'username', 'profile_photo_path', 'user_phone', 'userId')
            ->where('community_admins.communityId', '=', $communityId)->get();
        
        $communityVehicle = DB::table('community_vehicles')
            ->select('verified')
            ->where('userId', '=', Auth::user()->id)
            ->where('userVehicleId', '=', $userVehicleId)
            ->where('communityId', '=', $communityId)->first();

        return view('user.user-vehicles.vehicleCommunity')
            ->with('community', $community)
            ->with('communityAdmins', $communityAdmins)
            ->with('userVehicleId', $userVehicleId)
            ->with('communityVehicle', $communityVehicle);
    }

    public function unjoinCommunity(Request $request)
    {
        $communityVehicle = CommunityVehicle::where('userId', '=', Auth::user()->id)
                            ->where('userVehicleId', '=', $request->userVehicleId)
                            ->where('communityId', '=', $request->communityId)->firstOrFail();
        $userVehicle = UserVehicle::where('userVehicleId', '=', $request->userVehicleId)->firstOrFail();
            
        if ($communityVehicle->verified) {
            $userVehicle->timesVerified -= 1;
            $userVehicle->save();
        }
        $communityVehicle->delete();
        return redirect('my-vehicles/'.$request->userVehicleId.'/'.$userVehicle->vehicleBrand)->with('success', 'You have successfully unregistered this vehicle from '.$request->communityName);
    }
}
