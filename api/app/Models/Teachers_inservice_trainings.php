<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teachers_inservice_trainings extends Model
{
    //
    protected $fillable = [
        '_token',
        'institute_id',
        'higher_degree_id',
        'ht_training_yn',
        'ht_fl_training_yn',
        'ht_prserv_training_yn',
        'stc_training_total',
        'stc_training_female',
        'stt_bed_total',
        'stt_bed_female',
        'cpd1_total',
        'cpd1_female',
        'cpd1_eng_total',
        'cpd1_eng_female',
        'cpd2_total',
        'cpd2_female',
        'cpd14_total',
        'cpd14_female',
        'cluster_total',
        'cluster_female',
        'sba_total',
        'sba_female',
        'srizonsil_total',
        'srizonsil_female',
        'other_total',
        'other_female',
        'year'
    ];
}
