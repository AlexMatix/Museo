<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historical extends Model
{
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idHistorical',
            'date',
            'description',
            'lastip',
            'idUser',
            'name',
            'deleted',
        ];




// protected $hidden=['id','Estado'];
    public $timestamps = false;
}
