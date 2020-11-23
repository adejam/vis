<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunityAdmin;
use Webpatser\Uuid\Uuid;
use Auth;
use DB;

class CommunityAdminController extends Controller
{
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

        $adminPriveledges =  DB::table('communities')
            ->select(
                'community_admins.verifyUser',
                'community_admins.editUserVehicle',
                'community_admins.removeUserVehicle',
                'community_admins.addAdmin',
                'community_admins.addAdminRoles',
            )
            ->where('communityId', '=', $request->communityId)
            ->where('userId', '=', Auth::user()->id)->first();
            
        if ($request->id != Auth::user()->id) {
            if (!$userAlreadyAnAdmin) {
                if ($adminPriveledges->addAdmin === 1) {
                    $communityAdminId = utf8_encode(Uuid::generate());
                    $communityAdmin = new CommunityAdmin;
                    $communityAdmin->communityAdminId = $communityAdminId;
                    $communityAdmin->communityId = $request->communityId;
                    $communityAdmin->userId = $request->id;
                    $communityAdmin->verifyUser = $request->verifyUser ? 1 : 0;
                    $communityAdmin->editUserVehicle = $request->editUserVehicle ? 1 : 0;
                    $communityAdmin->removeUser = $request->removeUser ? 1 : 0;
                    $communityAdmin->addAdmin = $request->addAdmin ? 1 : 0;
                    $communityAdmin->addAdminRoles = $request->addAdminRoles  ? 1 : 0;
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
}
