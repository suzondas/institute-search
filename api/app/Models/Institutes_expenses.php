<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institutes_expenses extends Model
{
    protected $fillable = [
        '_token',
        'institute_id',
        'year',
        'education',
        'research',
        'library',
        'salary',
        'scholarship',
        'transport',
        'electricity',
        'structural_develop',
        'medical',
        'others',
        'education_per',
        'research_per',
        'library_per',
        'salary_per',
        'scholarship_per',
        'transport_per',
        'electricity_per',
        'structural_develop_per',
        'medical_per',
        'others_per',
        'research_tax',
        'research_tax_per',
        'research_devlop',
        'research_devlop_per',
        'research_income',
        'research_income_per',
        'research_fund_for',
        'research_fund_for_per',
        'research_fund_other',
        'research_fund_other_per',
        'per_std_cost'
    ];
}
