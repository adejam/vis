<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserVehicleController extends Controller
{
    public function index()
    {
        return view('user.user-vehicles.myVehicles');
    }
}
