<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idRole',
            'shortname',
            'description',
            'name',
            'archetype',
            'deleted',
        ];

    // protected $hidden=['id','Estado'];
    public $timestamps = false;
}








