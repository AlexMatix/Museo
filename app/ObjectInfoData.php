<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjectInfoData extends Model
{
    //
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idObjectInfoData',
            'data',
            'dataFormat',
            'idObject',
            'idInfoField',
            'deleted',
        ];

// protected $hidden=['id','Estado'];
    public $timestamps = false;
}
