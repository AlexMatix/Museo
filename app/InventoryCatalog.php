<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryCatalog extends Model
{
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable =
        [
            'idInventoryCatalogs',
            'title',
            'description',
            'idInventoryCatalogsParent',
            'deleted',
        ];


// protected $hidden=['id','Estado'];
    public $timestamps = false;
}
