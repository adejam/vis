<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\UserVehicleAccess;

class UserVehicleAccessController extends Controller
{
    public static function checkGrantedAccess($communityId, $userVehicleId)
    {
        return DB::table('user_vehicle_accesses')
            ->where('userVehicleId', '=', $userVehicleId)
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
        if ($vehicleAccess[$request->accessName]) {
            $vehicleAccess[$request->accessName] = 0;
            $vehicleAccess->save();
            return back()->with('success', ' Access Removed!');
        } else {
            $vehicleAccess[$request->accessName] = 1;
            $vehicleAccess->save();
            return back()->with('success', 'Access Granted!');
        }
    }
}
