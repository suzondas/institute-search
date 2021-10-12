<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institutes_researchs extends Model
{
    protected $fillable = [
        '_token',
        'institute_id',
        'own_fund',
        'private_fund',
        'foreign_fund',
        'masters_level',
        'pear_review',
        'published_book',
        'electric_book',
        'mfil_level',
        'phd_level',
        'pear_review_artical',
        'year'
    ];
}
