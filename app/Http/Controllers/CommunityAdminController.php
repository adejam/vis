<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunityAdmin;
use App\Models\Community;
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

    public function removeAdmin(Request $request, $communityAdminId=null)
    {
        $communityAdminId = $request->communityAdminId ? $request->communityAdminId : $communityAdminId;
        $communityAdmin = CommunityAdmin::where('communityAdminId', '=', $communityAdminId)->firstOrFail();
        $community = Community::where('communityId', '=', $communityAdmin->communityId)->firstOrFail();
        $adminPriveledges =  $this->getAdminPriv($communityAdmin->communityId);
        if ($community->userId != $communityAdmin->userId) {
            if ($adminPriveledges->removeAdmin === 1) {
                $communityAdmin->delete();
                return back()->with('success', ' Admin successfully removed!');
            } else {
                return back()->with('error', 'You don\'t have the priviledge to remove an admin');
            }
        } else {
            return back()->with('error', ' The main admin of the community cannot be removed!');
        }
    }

    public function verifyUser(Request $request)
    {
        return $request;
    }

    public function vehicleUsers($communityId)
    {
        $communityVehicleUsers =  DB::table('community_vehicles')
            ->join('user_vehicles', 'user_vehicles.userVehicleId', 'community_vehicles.userVehicleId')
            ->join('users', 'users.id', 'user_vehicles.userId')
            ->distinct()
            ->select(
                'users.name',
                'users.lastname',
                'users.username'
            )->where('communityId', '=', $communityId)
            ->where('community_vehicles.verified', '=', 1)->get();
        return view('user.my-community.communityUsers')
            ->with('communityVehicleUsers', $communityVehicleUsers)
            ->with('communityId', $communityId);
    }

    public function usersVehicle($communityId, $username)
    {
        $user =  DB::table('users')
            ->select(
                'id',
                'name',
                'username',
                'lastname',
                'profile_photo_path',
                'user_phone'
            )->where('username', '=', $username)->first();

        $communityUserVehicles =  DB::table('community_vehicles')
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
            ->where('community_vehicles.userId', '=', $user->id)
            ->where('community_vehicles.verified', '=', 1)->get();
        return view('user.my-community.communityVehicles')
            ->with('communityUserVehicles', $communityUserVehicles)
            ->with('user', $user);
    }
}
