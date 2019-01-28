<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjectInfoCategory extends Model
{
    //
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idObjectInfoCategories',
            'name',
            'sortorder',
        ];

// protected $hidden=['id','Estado'];
    public $timestamps = false;

}
