<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'user_group',
        'user_group_description',
        'password'
    ];

    // Eloquent: Relationships
    public function admins(){
        return $this->hasMany('App\Admin');
    }

    public function teachers(){
        return $this->hasMany('App\Teacher');
    }

    public function students(){
        return $this->hasMany('App\Student');
    }

    public function parents(){
        return $this->hasMany('App\Caretaker');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
