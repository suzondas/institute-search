<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institutes_incomes extends Model
{
    protected $fillable = [
        '_token',
        'institute_id',
        'amount',
        'pre_primary_amount',
        'primary_amount',
        'junior_secondary_amount',
        'o_level_amount',
        'a_level_amount',
        'student_fund',
        'own_fund',
        'foreign_fund',
        'other_fund',
        'year'
    ];
}
