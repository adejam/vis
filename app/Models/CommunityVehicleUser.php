<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityVehicleUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lastname',
        'user_phone',
        'locationInCommunity',
        'photo',
    ];
}
