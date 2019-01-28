<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    //
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idResearch',
            'title',
            'technique_materials',
            'date',
            'signing_marks',
            'signing_description',
            'short_description',
            'formal_description',
            'observations',
            'author',
            'origin',
            'period',
            'idObject',
            'deleted',
        ];

// protected $hidden=['id','Estado'];
    public $timestamps = false;
}















