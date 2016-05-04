<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    //
    /**
     * The attributes that are mass assignable
     * 
     * @var arrray
     */
    protected $fillable = ['path', 'name', 'thumbnail_path'];

    /**
     * Set a name for the photo and create directories for this photo plus its thumbnail.
     * 
     * @param string name
     */
    public function setNameAttribute($name){

        $this->attributes['name'] = $name;
        $this->path = $this->baseDir() . '/' . $name; 
        $this->thumbnail_path = $this->baseDir() . '/tn-' . $name; 

    }

    /**
     * Represent the one-to-many relationship between App\Flyer and App\Photo
     * 
     * @return HasMany
     */
    public function flyer(){
        return $this->belongsTo('App\Flyer');
    }

    /**
     * Show the directory to store photos in server
     * 
     * @return string
     */
    public function baseDir(){
        return 'flyers_stuff/photos';
    }
}
