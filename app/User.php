<?php

namespace Gifter;

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
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function gifts() {
        # User has many gifts
        return $this->hasMany('Gifter\Gift');
    }

    public function retailers() {
        # User has many retailers
        return $this->hasMany('Gifter\Retailer');
    }
}
