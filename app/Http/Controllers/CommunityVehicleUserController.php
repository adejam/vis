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
    public function validateVehiclePlateNumber($request)
    {
        $plateNumberExist = DB::table('community_vehicles')
            ->join('user_vehicles', 'user_vehicles.userVehicleId', 'community_vehicles.userVehicleId')
            ->select('plateNumber')
            ->where('community_vehicles.communityId', '=', $request->communityId)
            ->where('user_vehicles.plateNumber', '=', $request->plateNumber)
            ->first();

        if ($plateNumberExist) {
            return back()->with('error', 'Cannot add vehicle as a vehicle with the Plate Number already exist in this community or has sent a request to join this community');
        }
        
        
        $plateNumberAlreadyAdded = DB::table('community_user_vehicles')
            ->select(
                'plateNumber',
                'username'
            )->where('plateNumber', '=', $request->plateNumber)
            ->where('communityId', '=', $request->communityId)->first();
        if ($plateNumberAlreadyAdded) {
            return back()->with('error', 'Cannot add vehicle as a vehicle with the Plate Number is already added for '.$plateNumberAlreadyAdded->username);
        }
    }


    public function validateVehicleRegNum($request)
    {
        if ($request->vehicleRegNumAccess) {
            $this->validate(
                $request,
                [
                'vehicleRegNum' => ['required', 'string', 'max:255'],
                ]
            );

            $regNumExist = DB::table('community_vehicles')
                ->join('user_vehicles', 'user_vehicles.userVehicleId', 'community_vehicles.userVehicleId')
                ->select('vehicleRegNum')
                ->where('community_vehicles.communityId', '=', $request->communityId)
                ->where('user_vehicles.vehicleRegNum', '=', $request->vehicleRegNum)
                ->first();
            if ($regNumExist) {
                return back()->with('error', 'Cannot add vehicle as a vehicle with the Vehicle Registration Number already exist in this community or has sent a request to join this community');
            }

            $vehicleRegNumAlreadyAdded = DB::table('community_user_vehicles')
                ->select(
                    'vehicleRegNum',
                    'username'
                )->where('vehicleRegNum', '=', $request->vehicleRegNum)
                ->where('communityId', '=', $request->communityId)->first();

            if ($vehicleRegNumAlreadyAdded) {
                return back()->with('error', 'Cannot add vehicle as a vehicle with the Vehicle Registration Number is already added for '.$vehicleRegNumAlreadyAdded->username);
            }
        }
    }

    public function validateUserDriverLicenseId($request)
    {
        if ($request->driverLicenseIdAccess) {
            $this->validate(
                $request,
                [
                'driverLicenseId' => ['required', 'string', 'max:255'],
                ]
            );

            $licenseIdExist = DB::table('community_vehicles')
                ->join('user_vehicles', 'user_vehicles.userVehicleId', 'community_vehicles.userVehicleId')
                ->join('users', 'users.id', 'user_vehicles.userId')
                ->select('driverLicenseId')
                ->where('community_vehicles.communityId', '=', $request->communityId)
                ->where('users.driverLicenseId', '=', $request->driverLicenseId)
                ->first();
            if ($licenseIdExist) {
                return back()->with('error', 'Cannot add vehicle as a vehicle with the License ID already exist in this community or has sent a request to join this community');
            }

            $driverLicenseAlreadyAdded = DB::table('community_vehicle_users')
                ->select(
                    'driverLicenseId',
                    'username'
                )->where('driverLicenseId', '=', $request->driverLicenseId)
                ->where('communityId', '=', $request->communityId)->first();

            if ($driverLicenseAlreadyAdded) {
                return back()->with('error', 'Cannot add vehicle as a vehicle with the License ID is already added for '.$driverLicenseAlreadyAdded->username);
            }
        }
    }

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
            if ($adminPriveledges->verifyUser === 1 || $adminPriveledges->removeUserVehicle === 1) {
                $community = CommunityAdminController::getCommunityWithAccess($communityId);
                $user = DB::table('community_vehicle_users')
                    ->select(
                        'name',
                        'lastname',
                        'user_phone',
                        'username',
                        'profile_photo_path',
                        'locationInCommunity',
                        'driverLicenseId'
                    )->where('communityId', '=', $communityId)
                    ->where('username', '=', $username)->first();

                $vehicles = DB::table('community_user_vehicles')
                    ->select(
                        'communityUserVehicleId',
                        'communityId',
                        'vehicleBrand',
                        'vehicleModel',
                        'vehicleColor',
                        // 'driverLicenseId',
                        'vehicleRegNum',
                        'vehicleRegState',
                        'plateNumber'
                    )->where('username', '=', $username)->get();
            
                return view('user.my-community.communityUserVehicle')
                    ->with('community', $community)
                    ->with('user', $user)
                    ->with('vehicles', $vehicles);
            } else {
                return back()->with('error', 'You do not the the priviledge to views users');
            }
        } else {
            abort(404);
        }
    }

    public function addUserAndVehicle(Request $request)
    {
        $adminPriveledges =  CommunityAdminController::getAdminPriv($request->communityId);
        if ($adminPriveledges) {
            if ($adminPriveledges->verifyUser === 1) {
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
                    'plateNumber' => ['required', 'string', 'max:255'],
                    ]
                );
                
                $checkPlateNumberValidation = $this->validateVehiclePlateNumber($request);
                if ($checkPlateNumberValidation) {
                    return $checkPlateNumberValidation;
                }

                $checkVehicleRegNumValidation = $this->validateVehicleRegNum($request);
                if ($checkVehicleRegNumValidation) {
                    return $checkVehicleRegNumValidation;
                }

                $checkLicenseIdValidation = $this->validateUserDriverLicenseId($request);
                if ($checkLicenseIdValidation) {
                    return $checkLicenseIdValidation;
                }
                $lastUserId = DB::table('community_vehicle_users')->select('id')->latest()->first();
                $id = $lastUserId ? $lastUserId->id+1 : 1;
                $vehicleUser = new CommunityVehicleUser;
                $vehicleUser->communityId = $request->communityId;
                $vehicleUser->name = $request->name;
                $vehicleUser->lastname = $request->lastname;
                $vehicleUser->user_phone = $request->user_phone;
                $vehicleUser->locationInCommunity = $request->locationInCommunity;
                $vehicleUser->username = $request->name.'-'.$request->lastname.$id;
                $vehicleUser->driverLicenseId = $request->driverLicenseId;
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
                $userVehicle->vehicleRegNum = $request->vehicleRegNum;
                if ($request->vehicleRegStateAccess) {
                    $this->validate(
                        $request,
                        [
                        'vehicleRegState' => ['required', 'string', 'max:255'],
                        ]
                    );
                    $userVehicle->vehicleRegState = $request->vehicleRegState;
                }
                $userVehicle->plateNumber = $request->plateNumber;
                $vehicleUser->save();
                $userVehicle->save();
                
                return redirect('my-community/'.$vehicleUser->communityId.'/community-user-vehicles/'.$vehicleUser->username)
                    ->with('success', ''.$userVehicle->vehicleBrand.' successfully created for '.$vehicleUser->name.'!');
            } else {
                return back()->with('error', 'You do not the the priviledge to add vehicle users');
            }
        } else {
            abort(404);
        }
    }

    public function addUserVehicle(Request $request)
    {
        $adminPriveledges =  CommunityAdminController::getAdminPriv($request->communityId);
        if ($adminPriveledges) {
            if ($adminPriveledges->verifyUser === 1) {
                $this->validate(
                    $request,
                    [
                    'vehicleBrand' => ['required', 'string', 'max:255'],
                    'vehicleModel' => ['required', 'string', 'max:255'],
                    'vehicleColor' => ['required', 'string', 'max:255'],
                    'plateNumber' => ['required', 'string', 'max:255'],
                    ]
                );

                $checkPlateNumberValidation = $this->validateVehiclePlateNumber($request);
                if ($checkPlateNumberValidation) {
                    return $checkPlateNumberValidation;
                }

                $checkVehicleRegNumValidation = $this->validateVehicleRegNum($request);
                if ($checkVehicleRegNumValidation) {
                    return $checkVehicleRegNumValidation;
                }

                $communityUserVehicleId = utf8_encode(Uuid::generate());
                $userVehicle = new CommunityUserVehicle;
                $userVehicle->communityUserVehicleId = $communityUserVehicleId;
                $userVehicle->communityId = $request->communityId;
                $userVehicle->username = $request->username;
                $userVehicle->vehicleBrand = $request->vehicleBrand;
                $userVehicle->vehicleModel = $request->vehicleModel;
                $userVehicle->vehicleColor = $request->vehicleColor;
                $userVehicle->vehicleRegNum = $request->vehicleRegNum;
                if ($request->vehicleRegStateAccess) {
                    $this->validate(
                        $request,
                        [
                        'vehicleRegState' => ['required', 'string', 'max:255'],
                        ]
                    );
                    $userVehicle->vehicleRegState = $request->vehicleRegState;
                }
                $userVehicle->plateNumber = $request->plateNumber;
                $userVehicle->save();
                
                return back()->with('success', ''.$userVehicle->vehicleBrand.' successfully created!');
            } else {
                return back()->with('error', 'You do not the the priviledge to add user vehicles');
            }
        } else {
            abort(404);
        }
    }

    public function editVehicleUser(Request $request)
    {
        $adminPriveledges =  CommunityAdminController::getAdminPriv($request->communityId);
        if ($adminPriveledges) {
            if ($adminPriveledges->verifyUser === 1) {
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
                
                if ($vehicleUser->driverLicenseId !== $request->driverLicenseId) {
                    $checkLicenseIdValidation = $this->validateUserDriverLicenseId($request);
                    if ($checkLicenseIdValidation) {
                        return $checkLicenseIdValidation;
                    }
                }
                $vehicleUser->name = $request->name;
                $vehicleUser->lastname = $request->lastname;
                $vehicleUser->user_phone = $request->user_phone;
                $vehicleUser->locationInCommunity = $request->locationInCommunity;
                $vehicleUser->driverLicenseId = $request->driverLicenseId;
                $vehicleUser->save();

                return back()->with('success', 'Successfully Updated!');
            } else {
                return back()->with('error', 'You do not the the priviledge to edit vehicle users');
            }
        } else {
            abort(404);
        }
    }

    public function editVehicleUserPhoto(Request $request)
    {
        $adminPriveledges =  CommunityAdminController::getAdminPriv($request->communityId);
        if ($adminPriveledges) {
            if ($adminPriveledges->verifyUser === 1) {
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
                return back()->with('error', 'You do not the the priviledge to edit user photo');
            }
        } else {
            abort(404);
        }
    }

    public function editUserVehicle(Request $request)
    {
        $adminPriveledges =  CommunityAdminController::getAdminPriv($request->communityId);
        if ($adminPriveledges) {
            if ($adminPriveledges->verifyUser === 1) {
                $userVehicle = CommunityUserVehicle::where('communityUserVehicleId', '=', $request->communityUserVehicleId)->firstOrFail();
                $this->validate(
                    $request,
                    [
                    'vehicleBrand' => ['required', 'string', 'max:255'],
                    'vehicleModel' => ['required', 'string', 'max:255'],
                    'vehicleColor' => ['required', 'string', 'max:255'],
                    'driverLicenseId' => ['nullable', 'string', 'max:255'],
                    'plateNumber' => ['required', 'string', 'max:255'],
                    ]
                );

                if ($userVehicle->plateNumber !== $request->plateNumber) {
                    $checkPlateNumberValidation = $this->validateVehiclePlateNumber($request);
                    if ($checkPlateNumberValidation) {
                        return $checkPlateNumberValidation;
                    }
                }
                
                if ($userVehicle->vehicleRegNumber !== $request->vehicleRegNumber) {
                    $checkVehicleRegNumValidation = $this->validateVehicleRegNum($request);
                    if ($checkVehicleRegNumValidation) {
                        return $checkVehicleRegNumValidation;
                    }
                }

                $userVehicle->vehicleBrand = $request->vehicleBrand;
                $userVehicle->vehicleModel = $request->vehicleModel;
                $userVehicle->vehicleColor = $request->vehicleColor;
                $userVehicle->vehicleRegNum = $request->vehicleRegNum;
                $userVehicle->vehicleRegState = $request->vehicleRegState;
                $userVehicle->plateNumber = $request->plateNumber;
                $userVehicle->save();
                
                return back()->with('success', ''.$userVehicle->vehicleBrand.' Successfully Updated!');
            } else {
                return back()->with('error', 'You do not the the priviledge to edit user vehicles');
            }
        } else {
            abort(404);
        }
    }

    public function removeUserVehicle(Request $request)
    {
        $adminPriveledges =  CommunityAdminController::getAdminPriv($request->communityId);
        if ($adminPriveledges) {
            if ($adminPriveledges->removeUserVehicle === 1) {
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
                return back()->with('error', 'You do not the the priviledge to remove user vehicles');
            }
        } else {
            abort(404);
        }
    }

    public function deleteUserAndVehicle(Request $request)
    {
        $adminPriveledges =  CommunityAdminController::getAdminPriv($request->communityId);
        if ($adminPriveledges) {
            if ($adminPriveledges->removeUserVehicle === 1) {
                $vehicleUser = CommunityVehicleUser::where('username', '=', $request->username)->where('communityId', '=', $request->communityId)->firstOrFail();
                $userVehicles = CommunityUserVehicle::where('username', '=', $vehicleUser->username)->where('communityId', '=', $vehicleUser->communityId)->get();
                foreach ($userVehicles as $vehicle) {
                    $vehicle->delete();
                }
                $vehicleUser->delete();
                return redirect('my-community/'.$request->communityId.'/community-vehicle-users')
                    ->with('success', 'User and vehicle successfully deleted!');
            } else {
                return back()->with('error', 'You do not the the priviledge to remove users and their vehicles');
            }
        } else {
            abort(404);
        }
    }
}
