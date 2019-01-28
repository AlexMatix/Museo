<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idExhibition',
            'idOrganization',
            'name',
            'star_date',
            'end_date',
            'place',
            'contact_name',
            'telephone',
            'fax',
            'email',
            'address',
            'deleted',
        ];



// protected $hidden=['id','Estado'];
    public $timestamps = false;
}
