<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basic_crs_sammaries extends Model
{
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'BAS_3MOTN_TOT',
        'BAS_3MOTN_FEM',
        'BAS_3MOTN_STIP_TOT',
        'BAS_3MOTN_STIP_FEM',
        'BAS_6MOTN_TOT',
        'BAS_6MOTN_FEM',
        'BAS_6MOTN_STIP_TOT',
        'BAS_6MOTN_STIP_FEM',
        'RTO_3MOTN_TOT',
        'RTO_3MOTN_FEM',
        'RTO_3MOTN_STIP_TOT',
        'RTO_3MOTN_STIP_FEM',
        'NTV_360_TOT',
        'NTV_360_FEM',
        'NTV_360_STIP_TOT',
        'NTV_360_STIP_FEM',
        'RPL_360_TOT',
        'RPL_360_FEM',
        'RPL_360_STIP_TOT',
        'RPL_360_STIP_FEM',
        'RPL_DAYS_TOT',
        'RPL_DAYS_FEM',
        'RPL_DAYS_STIP_TOT',
        'RPL_DAYS_STIP_FEM',
        'YEAR'
    ];
}
