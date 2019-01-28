<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjectInfoField extends Model
{
    //
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idObjectInfoFields',
            'shortname',
            'name',
            'datatype',
            'description',
            'descriptionformat',
            'required',
            'locked',
            'visible',
            'forceunique',
            'defaultdataformat',
            'param1',
            'param2',
            'param3',
            'objectcategoryid',
            'deleted',
        ];

// protected $hidden=['id','Estado'];
    public $timestamps = false;
}

















