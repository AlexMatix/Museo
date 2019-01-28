<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Object extends Model
{
    CONST ACTIVE  = 1;
    CONST DELETED = 0;

    protected $fillable = [
        'idobject', 'origin_number', 'catalog_number', 'inventory_number',
        'appraisal', 'origin_description', 'date_of_entry',
        'collection_idCollection', 'subCollection_idSubCollection',
        'type', 'location', 'deleted'
    ];
}
