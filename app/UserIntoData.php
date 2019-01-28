<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserIntoData extends Model
{
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idUserIntoData',
            'idUser',
            'idUserInfoField',
            'data',
            'dataFormat',
        ];

    // protected $hidden=['id','Estado'];
    public $timestamps = false;
}
