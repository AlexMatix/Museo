<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    CONST ACTIVE  = 1;
    CONST DELETED = 0;
    protected $fillable =
        [
            'idPlace',
            'idExhibition',
            'deleted',
        ];

// protected $hidden=['id','Estado'];
    public $timestamps = false;
}





