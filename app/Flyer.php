<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    /**
     * Represent attributes that are mass assignable
     * 
     * @var [type]
     */
	protected $fillable = [
        'user_id',
		'address',
		'city',
		'state',
		'country',
		'zip',
		'price',
		'description'
	];

    
    /**
     * Represent a one-to-many relationship between App\Flyer and App\Photo
     * 
     * @return HasMany
     */
    public function photos(){
    	return $this->hasMany('App\Photo');
    }

    /**
     * Represent a one-to-many relationship between App\User and App\Photo
     * 
     * @return HasMany
     */
    public function owner(){
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Check if this flyer is owned by a user
     * 
     * @param  User $user a specific user
     * @return boolean
     */
    public function ownedBy(User $user){

        return $this->user_id == $user->id;

    }

    /**
     * Find a flyer based on a zip code and a address
     * 
     * @param  string $zip
     * @param  string $address
     * @return App\Flyer
     */
    public static function locatedAt($zip, $address){
    	$address = str_replace('-',' ',$address);
        return static::where(compact('zip', 'address'))->firstOrFail();

    }

    /**
     * Show the formatted form of a property's price
     * 
     * @param  integer $price
     * @return string
     */
    public function getPriceAttribute($price){
    	return '$' . number_format($price);
    }

    /**
     * Save the photo to database via this flyer
     * 
     * @param App\Photo $photo
     * @return App\Photo
     */
    public function addPhoto(Photo $photo){
        return $this->photos()->save($photo);
    }

    /**
     * Show the url to a specific flyer with its id
     * 
     * @return string
     */
    public function path(){
        //return $this->zip . '/' . str_replace(' ', '-', $this->address);
        return 'flyers' . '/' . $this->id;
    }

    /**
     * Return the short descrption for this flyer in flyers/index page
     *
     * @param  integer $length the input length of the short description
     * @return string
     */
    public function shortDescription($length = 200){
        return substr($this->description, 0, $length) . '...';
    }
}
