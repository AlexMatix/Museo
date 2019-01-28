<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idReport',
            'name',
            'path',
            'description',
            'deleted',
        ];

// protected $hidden=['id','Estado'];
    public $timestamps = false;
}






