<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photography extends Model
{
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idOrganization',
            'name',
            'telephone',
            'fax',
            'email',
            'url',
            'address',
            'cp',
            'rfc',
            'country',
            'city',
            'state',
            'giro',
            'status',
            'deleted',
        ];

// protected $hidden=['id','Estado'];
    public $timestamps = false;
}
