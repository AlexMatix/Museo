<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleCapabilities extends Model
{
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idRoleCapabilities',
            'idRole',
            'name',
            'timemodified',
        ];

    // protected $hidden=['id','Estado'];
    public $timestamps = false;
}





