<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    CONST ACTIVE = 1;
    CONST DELETED = 0;
    //


    protected $fillable =
        [
            'idCommunities',
            'name',
            'director',
            'address',
            'deleted',
        ];

// protected $hidden=['id','Estado'];
    public $timestamps = false;
}
