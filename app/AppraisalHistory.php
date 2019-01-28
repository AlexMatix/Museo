<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppraisalHistory extends Model
{
    CONST ACTIVE  = 1;
    CONST DELETED = 0;


    protected $fillable =
        [
            'idAppraisalHistories',
            'idObject',
            'previous_appraisal',
            'new_appraisal',
            'date',
            'updated_by',
            'authorized_by',
            'deleted',
        ];

// protected $hidden=['id','Estado'];
public $timestamps = false;

}
