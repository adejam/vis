<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    protected $fillable = [
        'communityName',
        'communityLocation',
        'aboutCommunity',
        'driverLicenseIdAccess',
        'vehicleRegNumAccess',
        'vehicleRegStateAccess',
    ];

    // protected $hidden = [
    //     'communityId',
    // ];
}
