<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    CONST ACTIVE  = 1;
    CONST DELETED = 0;
    CONST SUSPENDED = 1;
    CONST NOT_SUSPENDED = 0;


    protected $fillable = [
        'idUser',
        'username',
        'password',
        'name',
        'lastname',
        'email',
        'phone',
        'lastaccess',
        'lastip',
        'deleted',
        'suspended',
    ];
    public $timestamps = false;

//    /**
//     * The attributes that should be hidden for arrays.
//     *
//     * @var array
//     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];

}
