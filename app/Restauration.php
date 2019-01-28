<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restauration extends Model
{
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idRestaurations',
            'state_conservation',
            'materials',
            'analysis',
            'annexes',
            'date',
            'idObject',
            'deleted',
        ];

// protected $hidden=['id','Estado'];
    public $timestamps = false;
}










