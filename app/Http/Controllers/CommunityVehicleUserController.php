<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunityUserVehicle;
use App\Models\CommunityVehicleUser;
use App\Http\Controllers\CommunityAdminController;
use Illuminate\Validation\Rule;
use JD\Cloudder\Facades\Cloudder;
use Webpatser\Uuid\Uuid;
use Auth;
use DB;

class CommunityVehicleUserController extends Controller
{
    public function showVehicleUsers($communityId)
    {
        $adminPriveledges =  CommunityAdminController::getAdminPriv($communityId);
        if ($adminPriveledges) {
            $community = DB::table('communities')
                ->select('communityName')
                ->where('communityId', '=', $communityId)
                ->first();
            $users = DB::table('community_vehicle_users')
                ->select(
                    'name',
                    'lastname',
                    'username'
                )->where('communityId', '=', $communityId)->paginate(20);

            return view('user.my-community.communityUsers')
                ->with('communityVehicleUsers', $users)
                ->with('communityId', $communityId)
                ->with('communityName', $community->communityName);
        } else {
            abort(404);
        }
    }
    public function showUserVehicle($communityId, $username)
    {
        $adminPriveledges =  CommunityAdminController::getAdminPriv($communityId);
        if ($adminPriveledges) {
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
                    'communityId',
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
        } else {
            abort(404);
        }
    }

    public function addUserAndVehicle(Request $request)
    {
        $adminPriveledges =  CommunityAdminController::getAdminPriv($request->communityId);
        if ($adminPriveledges) {
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
            $userVehicle->communityId = $vehicleUser->communityId;
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
        } else {
            abort(404);
        }
    }

    public function addUserVehicle(Request $request)
    {
        $adminPriveledges =  CommunityAdminController::getAdminPriv($request->communityId);
        if ($adminPriveledges) {
            $this->validate(
                $request,
                [
                'vehicleBrand' => ['required', 'string', 'max:255'],
                'vehicleModel' => ['required', 'string', 'max:255'],
                'vehicleColor' => ['required', 'string', 'max:255'],
                'driverLicenseId' => ['nullable', 'string', 'max:255'],
                'vehicleRegNum' => ['nullable', 'string', 'max:255', 'unique:community_user_vehicles'],
                'vehicleRegState' => ['nullable', 'string', 'max:255'],
                'plateNumber' => ['required', 'string', 'max:255', 'unique:community_user_vehicles'],
                ]
            );

            $communityUserVehicleId = utf8_encode(Uuid::generate());
            $userVehicle = new CommunityUserVehicle;
            $userVehicle->communityUserVehicleId = $communityUserVehicleId;
            $userVehicle->communityId = $request->communityId;
            $userVehicle->username = $request->username;
            $userVehicle->vehicleBrand = $request->vehicleBrand;
            $userVehicle->vehicleModel = $request->vehicleModel;
            $userVehicle->vehicleColor = $request->vehicleColor;
            $userVehicle->driverLicenseId = $request->driverLicenseId;
            $userVehicle->vehicleRegNum = $request->vehicleRegNum;
            $userVehicle->vehicleRegState = $request->vehicleRegState;
            $userVehicle->plateNumber = $request->plateNumber;
            $userVehicle->save();
                
            return back()->with('success', ''.$userVehicle->vehicleBrand.' successfully created!');
        } else {
            abort(404);
        }
    }

    public function editVehicleUser(Request $request)
    {
        $adminPriveledges =  CommunityAdminController::getAdminPriv($request->communityId);
        if ($adminPriveledges) {
            $this->validate(
                $request,
                [
                'name' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'user_phone' => ['required', 'digits:11'],
                'locationInCommunity' => ['required', 'string', 'max:255'],
                ]
            );

            $vehicleUser = CommunityVehicleUser::where('username', '=', $request->username)->where('communityId', '=', $request->communityId)->firstOrFail();
            $vehicleUser->name = $request->name;
            $vehicleUser->lastname = $request->lastname;
            $vehicleUser->user_phone = $request->user_phone;
            $vehicleUser->locationInCommunity = $request->locationInCommunity;
            $vehicleUser->save();

            return back()->with('success', 'Successfully Updated!');
        } else {
            abort(404);
        }
    }

    public function editVehicleUserPhoto(Request $request)
    {
        $adminPriveledges =  CommunityAdminController::getAdminPriv($request->communityId);
        if ($adminPriveledges) {
            $this->validate(
                $request,
                [
                'photo' => ['required', 'image', 'max:1024'],
                ]
            );
            $vehicleUser = CommunityVehicleUser::where('username', '=', $request->username)->where('communityId', '=', $request->communityId)->firstOrFail();
            $photo = $request->file('photo');
            if ($vehicleUser->profile_photo_public_id) {
                Cloudder::destroyImage($vehicleUser->profile_photo_public_id);
            }
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
            $vehicleUser->save();

            return back()->with('success', 'Photo Successfully Updated!');
        } else {
            abort(404);
        }
    }

    public function editUserVehicle(Request $request)
    {
        $adminPriveledges =  CommunityAdminController::getAdminPriv($request->communityId);
        if ($adminPriveledges) {
            $userVehicle = CommunityUserVehicle::where('communityUserVehicleId', '=', $request->communityUserVehicleId)->firstOrFail();
            $this->validate(
                $request,
                [
                'vehicleBrand' => ['required', 'string', 'max:255'],
                'vehicleModel' => ['required', 'string', 'max:255'],
                'vehicleColor' => ['required', 'string', 'max:255'],
                'driverLicenseId' => ['nullable', 'string', 'max:255'],
                'vehicleRegNum' => ['nullable', 'string', 'max:255', Rule::unique('community_user_vehicles')->ignore($userVehicle->id)],
                'vehicleRegState' => ['nullable', 'string', 'max:255'],
                'plateNumber' => ['required', 'string', 'max:255', Rule::unique('community_user_vehicles')->ignore($userVehicle->id)],
                ]
            );

            $userVehicle->vehicleBrand = $request->vehicleBrand;
            $userVehicle->vehicleModel = $request->vehicleModel;
            $userVehicle->vehicleColor = $request->vehicleColor;
            $userVehicle->driverLicenseId = $request->driverLicenseId;
            $userVehicle->vehicleRegNum = $request->vehicleRegNum;
            $userVehicle->vehicleRegState = $request->vehicleRegState;
            $userVehicle->plateNumber = $request->plateNumber;
            $userVehicle->save();
                
            return back()->with('success', ''.$userVehicle->vehicleBrand.' Successfully Updated!');
        } else {
            abort(404);
        }
    }

    public function removeUserVehicle(Request $request)
    {
        $adminPriveledges =  CommunityAdminController::getAdminPriv($request->communityId);
        if ($adminPriveledges) {
            $userVehicle = CommunityUserVehicle::where('communityUserVehicleId', '=', $request->communityUserVehicleId)->firstOrFail();
            $userVehiclesCount = DB::table('community_user_vehicles')->select('id')->where('username', '=', $request->username)->where('communityId', '=', $request->communityId)->count();
            if ($userVehiclesCount > 1) {
                $userVehicle->delete();
                return back()->with('success', 'Vehicle Successfully deleted!');
            } else {
                $vehicleUser = CommunityVehicleUser::where('username', '=', $userVehicle->username)->where('communityId', '=', $userVehicle->communityId)->firstOrFail();
                $userVehicle->delete();
                $vehicleUser->delete();
                return redirect('my-community/'.$request->communityId.'/community-vehicle-users')
                    ->with('success', 'User and vehicle successfully deleted!');
            }
        } else {
            abort(404);
        }
    }

    public function deleteUserAndVehicle(Request $request)
    {
        $adminPriveledges =  CommunityAdminController::getAdminPriv($request->communityId);
        if ($adminPriveledges) {
            $vehicleUser = CommunityVehicleUser::where('username', '=', $request->username)->where('communityId', '=', $request->communityId)->firstOrFail();
            $userVehicles = CommunityUserVehicle::where('username', '=', $vehicleUser->username)->where('communityId', '=', $vehicleUser->communityId)->get();
            foreach ($userVehicles as $vehicle) {
                $vehicle->delete();
            }
            $vehicleUser->delete();
            return redirect('my-community/'.$request->communityId.'/community-vehicle-users')
                    ->with('success', 'User and vehicle successfully deleted!');
        } else {
            abort(404);
        }
    }
}
