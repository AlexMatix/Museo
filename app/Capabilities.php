<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capabilities extends Model
{
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idCapabilities',
            'name',
            'captype',
        ];

// protected $hidden=['id','Estado'];
    public $timestamps = false;

}
