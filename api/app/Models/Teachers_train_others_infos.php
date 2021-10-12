<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teachers_train_others_infos extends Model
{
    //
    protected $fillable = [
        '_token',
        'institute_id',
        'creative_3day_total',
        'creative_3day_female',
        'creative_12day_total',
        'creative_12day_female',
        'onjob_training_total',
        'onjob_training_female',
        'onjob_training_tribe_total',
        'onjob_training_tribe_female',
        'autism_guide_teacher_yn',
        'disaster_train_teacher_yn',
        'disaster_train_teacher',
        'training_required1',
        'training_required2',
        'training_required3',
        'training_required4',
        'total_eng_teachers',
        'female_eng_teacher',
        'hons_100_eng',
        'hons_300_eng',
        'eng_hons',
        'eng_hons_mst',
        'hons_without_eng',
        'eng_hsc_pass',
        'total_math_teachers',
        'female_math_teacher',
        'hons_pcm',
        'hons_other_math',
        'math_hons',
        'math_hons_mst',
        'deg_hsc_with_math',
        'hons_without_math',
        'math_hsc_pass',
        'hsc_without_math',
        'year'
    ];
}
