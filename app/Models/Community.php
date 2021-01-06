<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId',
        'communityName',
        'communityLocation',
        'aboutCommunity',
    ];

    // protected $hidden = [
    //     'communityId',
    // ];
}
