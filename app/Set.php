<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    protected $primaryKey = 'idSet';

    //
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable = [
        'idSet','title', 'idCommunity', 'description', 'deleted'
    ];
}
