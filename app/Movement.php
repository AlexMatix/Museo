<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idMovement',
            'idObject',
            'idExhibition',
            'policy',
            'start_date',
            'end_date',
            'deleted',
        ];

// protected $hidden=['id','Estado'];
    public $timestamps = false;
}
