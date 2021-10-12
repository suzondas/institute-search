<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board_exam_result extends Model
{
    protected $fillable = [
        '_token',
        'INSTITUTE_ID',
        'EXAM_ID',
        'SUBJECT',
        'REGISTERED_TOTAL',
        'REGISTERD_FEMALE',
        'TOTAL_CANDIDATE',
        'FEMALE_CANDIDATE',
        'A_PLUS_TOTAL',
        'A_PLUS_GIRLS',
        'A_TOTAL',
        'A_GIRLS',
        'A_MINUS_TOTAL',
        'A_MINUS_GIRLS',
        'B_TOTAL',
        'B_GIRLS',
        'C_TOTAL',
        'C_GIRLS',
        'D_TOTAL',
        'D_GIRLS',
        'TOTAL_PASS',
        'GIRLS_PASS',
        'FOREIGN_STD',
        'YEAR'
    ];
}
