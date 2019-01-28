<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvestigationCatalog extends Model
{
    //
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idInvestigationCatalog',
            'title',
            'description',
            'deleted',
            'deleted',
        ];



// protected $hidden=['id','Estado'];
    public $timestamps = false;
}
