<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use Webpatser\Uuid\Uuid;
use Auth;
use DB;

class CommunityController extends Controller
{
    public function index()
    {
        $communities =  DB::table('communities')->select(
            'communityId',
            'communityName',
            'communityLocation',
            'aboutCommunity'
        )->where('userId', '=', Auth::id())->get();
        return view('user.community')->with('communities', $communities);
    }
       
 
    public function add(Request $request)
    {
        $this->validate(
            $request,
            [
            'communityName' => ['required', 'string', 'max:255'],
            'communityLocation' => ['required', 'string', 'max:255'],
            'aboutCommunity' => ['required', 'string', 'max:255'],
            ]
        );
        $communityId = utf8_encode(Uuid::generate());
        $community = new Community;
        $community->communityId = $communityId;
        $community->userId = Auth::user()->id;
        $community->communityName = $request->communityName;
        $community->communityLocation = $request->communityLocation;
        $community->aboutCommunity = $request->aboutCommunity;
        $community->save();
              
                
        return back()->with('success', ''.$community->communityName.' successfully created!');
    }

    public function update(Request $request)
    {
        $this->validate(
            $request,
            [
            'communityName' => ['required', 'string', 'max:255'],
            'communityLocation' => ['required', 'string', 'max:255'],
            'aboutCommunity' => ['required', 'string', 'max:255'],
            ]
        );
        $community = Community::where('communityId', '=', $request->communityId)->firstOrFail();
        ;
        $community->communityName = $request->communityName;
        $community->communityLocation = $request->communityLocation;
        $community->aboutCommunity = $request->aboutCommunity;
        $community->save();
              
                
        return back()->with('success', ''.$community->communityName.' successfully Updated!');
    }

    public function delete(Request $request, $id=null)
    {
        $communityId = $request->communityId ? $request->communityId : $id;
        $community = Community::where('communityId', '=', $communityId)->firstOrFail();
        $delete = $community->delete();
        if ($delete) {
            return back()->with('success', ' successfully Deleted!');
        }
    }
}
