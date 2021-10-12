<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{


    public function groups()
    {
        return $this->hasMany(Groups::class,'education_level_id','education_level_id')
            ->select(['group_id','education_level_id','group_name_bn']);
    }
}
