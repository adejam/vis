<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\UserVehicleAccess;

class UserVehicleAccessController extends Controller
{
    public static function checkGrantedAccess($communityId, $userVehicleId)
    {
        return DB::table('user_vehicle_accesses')
            ->select(
                'grantDriverLicenseIdAccess',
                'grantVehicleRegNumAccess',
                'grantVehicleRegStateAccess'
            )
            ->where('userVehicleId', '=', $userVehicleId)
            ->where('communityId', '=', $communityId)->first();
    }
}
