<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\UserVehicleAccess;
use App\Models\Community;

class UserVehicleAccessController extends Controller
{
    public static function checkGrantedAccess($communityId, $userId)
    {
        return DB::table('user_vehicle_accesses')
            // ->where('userVehicleId', '=', $userVehicleId)
            ->where('userId', '=', $userId)
            ->where('communityId', '=', $communityId)->first();
    }

    public function getVehicleAccess($communityId, $userVehicleId)
    {
        return UserVehicleAccess::where('userId', '=', Auth::user()->id)
        ->where('userVehicleId', '=', $userVehicleId)
        ->where('communityId', '=', $communityId)->firstOrFail();
    }

    public function grantOrRemoveAccess(Request $request)
    {
        $vehicleAccess = $this->getVehicleAccess($request->communityId, $request->userVehicleId);
        $community =  Community::select(
            'driverLicenseIdAccess',
            'vehicleRegNumAccess',
            'vehicleRegStateAccess'
        )
            ->where('communityId', '=', $request->communityId)->first();
        if ($vehicleAccess[$request->accessName]) {
            if ($community[$request->requiredAccess] != $vehicleAccess[$request->accessName]) {
                $vehicleAccess[$request->accessName] = 0;
                $vehicleAccess->save();
                return back()->with('success', ' Access Removed!');
            } else {
                return back()->with('error', 'Community Requirement changed. Review changes and try again!');
            }
        } else {
            if ($community[$request->requiredAccess] != $vehicleAccess[$request->accessName]) {
                $vehicleAccess[$request->accessName] = 1;
                $vehicleAccess->save();
                return back()->with('success', 'Access Granted!');
            } else {
                return back()->with('error', 'Community Requirement changed. Review changes and try again!');
            }
        }
    }
}
