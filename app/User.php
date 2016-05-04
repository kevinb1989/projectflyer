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
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * Check if this user owns the flyer
    *
    * $param App\Flyer a flyer object
    * $return boolean
    */
    public function owns($relation){
        return $relation->user_id == $this->id;
    }

    /**
     * Represent the one-to-many relationship between App\User and App\Flyer
     * 
     * @return hasMany
     */
    public function flyers(){
        return $this->hasMany('App\Flyer');
    }

    /**
     *  save a flyer object via this user
     *
     * @param App\Flyer a new flyer object
     * @return App\Flyer
     */
    public function publish(Flyer $flyer){
        return $this->flyers()->save($flyer);
    }
}
