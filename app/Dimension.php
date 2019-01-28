<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    //
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idDimension',
            'height_with_base',
            'width_with_base',
            'depth_with_base',
            'diameter_with_base',
            'height',
            'width',
            'depth',
            'diameter',
            'idMeasure',
            'idObject',
            'deleted',
        ];

// protected $hidden=['id','Estado'];
    public $timestamps = false;
}
