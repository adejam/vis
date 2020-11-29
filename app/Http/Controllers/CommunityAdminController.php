<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunityAdmin;
use App\Models\Community;
use App\Models\CommunityVehicle;
use Webpatser\Uuid\Uuid;
use Auth;
use DB;

class CommunityAdminController extends Controller
{
    public function getAdminPriv($communityId)
    {
        return DB::table('community_admins')
            ->select(
                'community_admins.verifyUser',
                'community_admins.removeUserVehicle',
                'community_admins.addAdmin',
                'community_admins.identifyVehicleUser',
                'community_admins.editAdminRoles',
                'community_admins.removeAdmin',
            )
            ->where('communityId', '=', $communityId)
            ->where('userId', '=', Auth::user()->id)->first();
    }

    public function getUserByUsername($username)
    {
        return DB::table('users')
            ->select(
                'id',
                'name',
                'username',
                'lastname',
                'profile_photo_path',
                'user_phone'
            )->where('username', '=', $username)->first();
    }

    public function communityUserVehicles($communityId, $id, $verifyStatus)
    {
        return DB::table('community_vehicles')
            ->join('user_vehicles', 'user_vehicles.userVehicleId', 'community_vehicles.userVehicleId')
            ->select(
                'community_vehicles.verified',
                'community_vehicles.communityId',
                'user_vehicles.userVehicleId',
                'user_vehicles.vehicleBrand',
                'user_vehicles.vehicleModel',
                'user_vehicles.vehicleColor',
                'user_vehicles.driverLicenseId',
                'user_vehicles.vehicleRegNum',
                'user_vehicles.vehicleRegState',
                'user_vehicles.plateNumber',
            )->where('community_vehicles.communityId', '=', $communityId)
            ->where('community_vehicles.userId', '=', $id)
            ->where('community_vehicles.verified', '=', $verifyStatus)->get();
    }
    

    public function add(Request $request)
    {
        $this->validate(
            $request,
            [
            'id' => ['required', 'digits_between:1,10'],
            'username' => ['required', 'string', 'max:255'],
            ]
        );
        $userAlreadyAnAdmin =  DB::table('community_admins')
            ->select('communityAdminId')
            ->where('communityId', '=', $request->communityId)
            ->where('userId', '=', $request->id)->first();

        $adminPriveledges =  $this->getAdminPriv($request->communityId);
            
        if ($request->id != Auth::user()->id) {
            if (!$userAlreadyAnAdmin) {
                if ($adminPriveledges->addAdmin === 1) {
                    $communityAdminId = utf8_encode(Uuid::generate());
                    $communityAdmin = new CommunityAdmin;
                    $communityAdmin->communityAdminId = $communityAdminId;
                    $communityAdmin->communityId = $request->communityId;
                    $communityAdmin->userId = $request->id;
                    $communityAdmin->verifyUser = $request->verifyUser ? 1 : 0;
                    $communityAdmin->removeUserVehicle = $request->removeUserVehicle ? 1 : 0;
                    $communityAdmin->removeAdmin = $request->removeAdmin ? 1 : 0;
                    $communityAdmin->addAdmin = $request->addAdmin ? 1 : 0;
                    $communityAdmin->editAdminRoles = $request->editAdminRoles  ? 1 : 0;
                    $communityAdmin->identifyVehicleUser = $request->identifyVehicleUser  ? 1 : 0;
                    $communityAdmin->save();
                    return back()->with('success', ''.$request->username.' successfully added as admin!');
                } else {
                    return back()->with('error', 'You don\'t have the priviledge to add an admin');
                }
            } else {
                return back()->with('error', ''.$request->username.' is already an admin');
            }
        } else {
            return back()->with('error', ' You an already an admin!');
        }
    }

    public function updateAdmin(Request $request)
    {
        $communityAdminId = $request->communityAdminId ? $request->communityAdminId : $communityAdminId;
        $communityAdmin = CommunityAdmin::where('communityAdminId', '=', $communityAdminId)->firstOrFail();
        $community = Community::where('communityId', '=', $communityAdmin->communityId)->firstOrFail();
        $adminPriveledges =  $this->getAdminPriv($communityAdmin->communityId);
        if ($community->userId != $communityAdmin->userId) {
            if ($adminPriveledges->editAdminRoles === 1) {
                if ($community->userId != $communityAdmin->userId) {
                    $communityAdmin->verifyUser = $request->verifyUser ? 1 : 0;
                    $communityAdmin->removeUserVehicle = $request->removeUserVehicle ? 1 : 0;
                    $communityAdmin->removeAdmin = $request->removeAdmin ? 1 : 0;
                    $communityAdmin->addAdmin = $request->addAdmin ? 1 : 0;
                    $communityAdmin->editAdminRoles = $request->editAdminRoles  ? 1 : 0;
                    $communityAdmin->identifyVehicleUser = $request->identifyVehicleUser  ? 1 : 0;
                    $communityAdmin->save();
                    return back()->with('success', 'You have successfully updated the role of '.$request->username);
                } else {
                    return back()->with('error', 'You cannot edit your roles');
                }
            } else {
                return back()->with('error', 'You don\'t have the priviledge to edit admin roles');
            }
        } else {
            return back()->with('error', ' The role of the main admin cannot change!');
        }
    }

    public function removeAdmin(Request $request, $communityAdminId=null)
    {
        $communityAdminId = $request->communityAdminId ? $request->communityAdminId : $communityAdminId;
        $communityAdmin = CommunityAdmin::where('communityAdminId', '=', $communityAdminId)->firstOrFail();
        $community = Community::where('communityId', '=', $communityAdmin->communityId)->firstOrFail();
        $adminPriveledges =  $this->getAdminPriv($communityAdmin->communityId);
        if ($community->userId != $communityAdmin->userId) {
            if ($adminPriveledges->removeAdmin === 1) {
                $communityAdmin->delete();
                if ($community->userId != $communityAdmin->userId) {
                    return redirect('/my-community/')->with('success', ' you have successfully removed yourself as an admin of'.$community->communityName.'!');
                } else {
                    return back()->with('success', ' Admin successfully removed!');
                }
            } else {
                return back()->with('error', 'You don\'t have the priviledge to remove an admin');
            }
        } else {
            return back()->with('error', ' The main admin of the community cannot be removed!');
        }
    }

    public function communityVehicleUsers($communityId, $verifiedStatus)
    {
        return DB::table('community_vehicles')
            ->join('users', 'users.id', 'community_vehicles.userId')
            ->distinct()
            ->select(
                'users.name',
                'users.lastname',
                'users.username'
            )->where('communityId', '=', $communityId)
            ->where('community_vehicles.verified', '=', $verifiedStatus)->get();
    }

    public function registrationRequests($communityId)
    {
        $adminPriveledges =  $this->getAdminPriv($communityId);
        if ($adminPriveledges) {
            $communityVehicleUsers =  $this->communityVehicleUsers($communityId, 0);
            return view('user.my-community.registrationRequests')
                ->with('communityVehicleUsers', $communityVehicleUsers)
                ->with('communityId', $communityId);
        } else {
            abort(404);
        }
    }

    public function registrationRequestsVehicles($communityId, $username)
    {
        $adminPriveledges =  $this->getAdminPriv($communityId);
        if ($adminPriveledges) {
            $user =  $this->getUserByUsername($username);

            $communityUserVehicles = $this->communityUserVehicles($communityId, $user->id, 0);
            if ($communityUserVehicles) {
                return view('user.my-community.communityVehicles')
                    ->with('communityUserVehicles', $communityUserVehicles)
                    ->with('user', $user);
            } else {
                return redirect('/my-community/'.$communityId);
            }
        } else {
            abort(404);
        }
    }

    public function verifyUser(Request $request)
    {
        $adminPriveledges =  $this->getAdminPriv($request->communityId);
        if ($adminPriveledges) {
            if ($adminPriveledges->verifyUser) {
                $communityVehicle = CommunityVehicle::where('userVehicleId', '=', $request->userVehicleId)
                                  ->where('communityId', '=', $request->communityId)->firstOrFail();
                $communityVehicle->verified = 1;
                $communityVehicle->save();
                return back()->with('success', ' Vehicle has been verified and registered with community!');
            } else {
                return back()->with('error', 'You don\'t have the priviledge to verify a user');
            }
        } else {
            abort(404);
        }
    }

    public function vehicleUsers($communityId)
    {
        $adminPriveledges =  $this->getAdminPriv($communityId);
        if ($adminPriveledges) {
            $communityVehicleUsers =  $this->communityVehicleUsers($communityId, 1);
            return view('user.my-community.communityUsers')
                ->with('communityVehicleUsers', $communityVehicleUsers)
                ->with('communityId', $communityId);
        } else {
            abort(404);
        }
    }

    public function usersVehicle($communityId, $username)
    {
        $adminPriveledges =  $this->getAdminPriv($communityId);
        if ($adminPriveledges) {
            $user =  $this->getUserByUsername($username);

            $communityUserVehicles = $this->communityUserVehicles($communityId, $user->id, 1);
            if ($communityUserVehicles) {
                return view('user.my-community.communityVehicles')
                    ->with('communityUserVehicles', $communityUserVehicles)
                    ->with('user', $user);
            } else {
                return redirect('/my-community/'.$communityId);
            }
        } else {
            abort(404);
        }
    }

    public function removeUserVehicle(Request $request)
    {
        $adminPriveledges =  $this->getAdminPriv($request->communityId);
        if ($adminPriveledges) {
            if ($adminPriveledges->removeUserVehicle) {
                $communityVehicle = CommunityVehicle::where('userVehicleId', '=', $request->userVehicleId)
                                  ->where('communityId', '=', $request->communityId)->firstOrFail();
                $communityVehicle->delete();
                return back()->with('success', ' Vehicle has been successfully removed!');
            } else {
                return back()->with('error', 'You don\'t have the priviledge to remove this vehicle');
            }
        } else {
            abort(404);
        }
    }

    public function identifyVehicleUser(Request $request)
    {
        $adminPriveledges =  $this->getAdminPriv($request->communityId);
        if ($adminPriveledges) {
            if ($adminPriveledges->identifyVehicleUser) {
                $user = DB::table('community_vehicles')
                    ->join('user_vehicles', 'user_vehicles.userVehicleId', 'community_vehicles.userVehicleId')
                    ->join('users', 'users.id', 'user_vehicles.userId')
                    ->select(
                        'community_vehicles.communityId',
                        'community_vehicles.locationInCommunity',
                        'user_vehicles.userVehicleId',
                        'user_vehicles.vehicleBrand',
                        'user_vehicles.vehicleModel',
                        'user_vehicles.vehicleColor',
                        'user_vehicles.driverLicenseId',
                        'user_vehicles.vehicleRegNum',
                        'user_vehicles.vehicleRegState',
                        'user_vehicles.plateNumber',
                        'users.name',
                        'users.username',
                        'users.lastname',
                        'users.profile_photo_path',
                        'users.user_phone'
                    )->where('community_vehicles.communityId', '=', $request->communityId)
                    ->where('user_vehicles.plateNumber', '=', $request->plateNumber)
                    ->where('community_vehicles.verified', '=', 1)->first();
                return view('user.my-community.identifyUser')
                    ->with('user', $user);
            } else {
                return back()->with('error', 'You don\'t have the priviledge to identify this vehicle\'s user');
            }
        } else {
            abort(404);
        }
    }
}
