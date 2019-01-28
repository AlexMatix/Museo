<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bibliography extends Model
{
    //
    CONST ACTIVE  = 1;
    CONST DELETED = 0;
    protected $fillable =
        [
            'idBibliographies',
            'idResearch',
            'number',
            'author',
            'article',
            'title',
            'chapter',
            'chapter_number',
            'editorial',
            'city',
            'date',
            'pages',
            'deleted',
        ];

// protected $hidden=['id','Estado'];
    public $timestamps = false;

}
