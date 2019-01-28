<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCollection extends Model
{
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idSubCollection',
            'title',
            'idCollection',
            'deleted',
        ];

    // protected $hidden=['id','Estado'];
    public $timestamps = false;
}
