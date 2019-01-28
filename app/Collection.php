<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $primaryKey = 'idCollection';

    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idCollection',
            'name',
            'idSet',
            'description',
            'deleted',
        ];

// protected $hidden=['id','Estado'];
    public $timestamps = false;
}
