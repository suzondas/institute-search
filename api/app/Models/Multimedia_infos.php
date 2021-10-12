<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multimedia_infos extends Model
{
    //
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'CLASS_ROOM_MULTIMEDIA',
        'MULTIMEDIA_CLASS_NUM',
        'DASHBOARD_ENTRY_YN',
        'MULTIMEDIA_USED_STD_NUM',
        'MULTIMEDIA_PROJECTOR_YN',
        'MULTIMEDIA_PROJECTOR_NUMBER',
        'MULT_EXPERT_TEACH_TOT',
        'MULT_EXPERT_TEACH_FEM',
        'YEAR'

    ];
}
