<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserIntoField extends Model
{
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idUserIntoField',
            'shortname',
            'name',
            'datatype',
            'description',
            'descriptionformat',
            'required',
            'locked',
            'visible',
            'forceunique',
            'defaultdata',
            'defaultdataformat',
            'param1',
            'param2',
            'param3',
            'categoryid',
        ];
    // protected $hidden=['id','Estado'];
    public $timestamps = false;
}
