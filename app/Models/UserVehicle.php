<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicleBrand',
        'vehicleModel',
        'vehicleColor',
        'driverLicenseId',
        'vehicleRegNum',
        'vehicleRegState',
        'plateNumber'
    ];
}
