<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserIntoCategory extends Model
{
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idUserIntoCategories',
            'name',
            'sortorder',
        ];
    // protected $hidden=['id','Estado'];
    public $timestamps = false;
}
