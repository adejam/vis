<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Community;
use App\Models\CommunityAdmin;
use App\Models\CommunityVehicle;
use App\Models\UserVehicle;
use Webpatser\Uuid\Uuid;
use Auth;
use DB;

class CommunityController extends Controller
{
    public function index()
    {
        $communities =  DB::table('community_admins')
            ->join('communities', 'communities.communityId', 'community_admins.communityId')
            ->select(
                'communities.communityId',
                'communities.userId',
                'communityName',
            )->where('community_admins.userId', '=', Auth::id())->get();
        return view('user.my-community.myCommunity')->with('communities', $communities);
    }

    public function communityVehicleUsers($communityId, $verifiedStatus)
    {
        return DB::table('community_vehicles')
            ->join('users', 'users.id', 'community_vehicles.userId')
            ->distinct()
            ->select(
                'userId',
            )->where('communityId', '=', $communityId)
            ->where('community_vehicles.verified', '=', $verifiedStatus)->count();
    }

    public function getMyCommunity($communityId)
    {
        $community =  DB::table('community_admins')
            ->join('communities', 'communities.communityId', 'community_admins.communityId')
            ->select(
                'communities.userId',
                'communities.communityId',
                'communityName'
            )->where('community_admins.userId', '=', Auth::id())
            ->where('community_admins.communityId', '=', $communityId)->first();
            
        if (!$community) {
            abort(404);
        }
        $communityVehicleUsers =  $this->communityVehicleUsers($communityId, 1);
        $registrationRequests =  $this->communityVehicleUsers($communityId, 0);
        return view('user.my-community.getMyCommunity')
            ->with('community', $community)
            ->with('communityVehicleUsers', $communityVehicleUsers)
            ->with('registrationRequests', $registrationRequests);
    }

    public function getMyCommunitySettings($communityId)
    {
        $community =  DB::table('community_admins')
            ->join('communities', 'communities.communityId', 'community_admins.communityId')
            ->select(
                'communities.userId',
                'communities.communityId',
                'communityName',
                'communityLocation',
                'aboutCommunity',
                'driverLicenseIdAccess',
                'vehicleRegNumAccess',
                'vehicleRegStateAccess'
            )->where('community_admins.userId', '=', Auth::id())
            ->where('community_admins.communityId', '=', $communityId)->first();
        if (!$community) {
            abort(404);
        }
        return view('user.my-community.getMyCommunitySettings')
            ->with('community', $community);
    }

    public function getMyCommunityAdmins($communityId)
    {
        $community =  DB::table('community_admins')
            ->join('communities', 'communities.communityId', 'community_admins.communityId')
            ->select(
                'communities.userId',
                'communities.communityId',
                'communityName',
                'communityLocation',
                'addAdmin',
                'removeAdmin',
                'editAdminRoles',
                'aboutCommunity'
            )->where('community_admins.userId', '=', Auth::id())
            ->where('community_admins.communityId', '=', $communityId)->first();
        if (!$community) {
            abort(404);
        }
        $communityAdmins =  DB::table('community_admins')
            ->join('users', 'users.id', 'community_admins.userId')
            ->select(
                'communityAdminId',
                'userId',
                'username',
                'name',
                'lastname',
                'user_phone',
                'profile_photo_path',
                'verifyUser',
                'removeUserVehicle',
                'addAdmin',
                'identifyVehicleUser',
                'editAdminRoles',
                'removeAdmin'
            )->where('communityId', '=', $communityId)->paginate(15);
        return view('user.my-community.getMyCommunityAdmins')
            ->with('community', $community)
            ->with('communityAdmins', $communityAdmins);
    }
       
 
    public function add(Request $request)
    {
        $this->validate(
            $request,
            [
            'communityName' => ['required', 'string', 'max:255', 'unique:communities'],
            'communityLocation' => ['required', 'string', 'max:255'],
            'aboutCommunity' => ['required', 'string', 'max:255'],
            ]
        );
        
        return $request;

        $communityId = utf8_encode(Uuid::generate());
        $community = new Community;
        $community->communityId = $communityId;
        $community->userId = Auth::user()->id;
        $community->communityName = $request->communityName;
        $community->communityLocation = $request->communityLocation;
        $community->aboutCommunity = $request->aboutCommunity;
        $community->driverLicenseIdAccess = $request->driverLicenseIdAccess ? 1 : 0;
        $community->vehicleRegNumAccess = $request->vehicleRegNumAccess ? 1 : 0;
        $community->vehicleRegStateAccess = $request->vehicleRegStateAccess ? 1 : 0;
        $community->save();

        $communityAdminId = utf8_encode(Uuid::generate(4));
        $communityAdmin = new CommunityAdmin;
        $communityAdmin->communityAdminId = $communityAdminId;
        $communityAdmin->communityId = $community->communityId;
        $communityAdmin->userId = Auth::user()->id;
        $communityAdmin->verifyUser = 1;
        $communityAdmin->removeUserVehicle = 1;
        $communityAdmin->removeAdmin = 1;
        $communityAdmin->addAdmin = 1;
        $communityAdmin->editAdminRoles = 1;
        $communityAdmin->identifyVehicleUser = 1;
        $communityAdmin->save();
                
        return redirect('/my-community/'.$community->communityId)->with('success', ''.$community->communityName.' successfully created!');
    }

    public function update(Request $request)
    {
        $community = Community::where('communityId', '=', $request->communityId)->firstOrFail();
        if ($community->userId !== Auth::id()) {
            return back()->with('error', 'Only the creator of this community can edit the community details!');
        }
        $this->validate(
            $request,
            [
            'communityName' => ['required', 'string', 'max:255',Rule::unique('communities')->ignore($community->id)],
            'communityLocation' => ['required', 'string', 'max:255'],
            'aboutCommunity' => ['required', 'string', 'max:255'],
            ]
        );
        $community->communityName = $request->communityName;
        $community->communityLocation = $request->communityLocation;
        $community->aboutCommunity = $request->aboutCommunity;
        $community->driverLicenseIdAccess = $request->driverLicenseIdAccess ? 1 : 0;
        $community->vehicleRegNumAccess = $request->vehicleRegNumAccess ? 1 : 0;
        $community->vehicleRegStateAccess = $request->vehicleRegStateAccess ? 1 : 0;
        $community->save();
                
        return back()->with('success', ''.$community->communityName.' successfully Updated!');
    }

    public function delete(Request $request, $id=null)
    {
        $communityId = $request->communityId ? $request->communityId : $id;
        $community = Community::where('communityId', '=', $communityId)->firstOrFail();
        if ($community->userId !== Auth::id()) {
            return back()->with('error', 'Only the creator of this community can edit the community details!');
        }
        $communityAdmins = CommunityAdmin::where('communityId', '=', $communityId)->get();
        $communityVehicles = CommunityVehicle::where('communityId', '=', $communityId)->get();
        foreach ($communityAdmins as $admin) {
            $admin->delete();
        }
        foreach ($communityVehicles as $vehicle) {
            $userVehicle = UserVehicle::where('userVehicleId', '=', $vehicle->userVehicleId)->firstOrFail();
            $vehicle->delete();
            $userVehicle->timesVerified -= 1;
            $userVehicle->save();
        }
        $community->delete();
        return redirect('/my-community')->with('success', ' successfully deleted!');
    }
}
