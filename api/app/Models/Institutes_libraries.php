<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institutes_libraries extends Model
{
    //
    protected $fillable = [
        '_token',
        'institute_id',
        'seperate_building_yn',
        'library_yn',
        'no_book',
        'no_additional_book',
        'book_issue_yn',
        'regular_issue_yn',
        'monthly_issue_book',
        'computerized_catelog_yn',
        'librarian_teacher_yn',
        'training_yn',
        'lib_hour_inclusive_yn',
        'language_club_yn',
        'language_bangla',
        'language_english',
        'language_arabic',
        'language_chinese',
        'language_korean',
        'language_russian',
        'language_japan',
        'language_spanish',
        'language_others',
        'univ_total_book',
        'univ_total_jurnal',
        'univ_total_audio',
        'univ_curr_year_book',
        'univ_curr_year_jurnal',
        'univ_curr_year_audio',
        'univ_ebook',
        'univ_ejurnal',
        'univ_eaudio',
        'univ_other_book',
        'univ_other_jurnal',
        'univ_other_audio',
        'year'
    ];
}
