<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleAssignments extends Model
{
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idRoleAssignments',
            'idRole',
            'idUser',
            'timemodified',
        ];

    // protected $hidden=['id','Estado'];
    public $timestamps = false;
}




