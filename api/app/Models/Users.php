<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $fillable = [
        '_token',
        'EIIN',
        'PASSWORD',
        'USER_NAME',
        'USER_TYPE',
        'ACTIVE',
        'INSTITUTE_TYPE',
        'COMMENTS',
        'INSTITUTE_ID'
    ];
}
