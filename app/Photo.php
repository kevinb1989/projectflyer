<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    //

    protected $fillable = ['path', 'name', 'thumbnail_path'];

    protected $baseDir = 'flyers_stuff/photos';

    protected $file;

    protected static function boot(){
        static::creating(function($photo){
            return $photo->upload();

        });
    }

    // public static function named(UploadedFile $file){
        
    //     return (new static)->saveAs($file->getClientOriginalName());

        
    // }

    // protected function saveAs($name){
    //     $this->name = sprintf('%s-%s', time(), $name);
    //     $this->path = sprintf('%s/%s', $this->baseDir, $this->name);
    //     $this->thumbnail_path = sprintf('%s/tn_%s', $this->baseDir, $this->name);
    //     return $this;
    // }

    public function flyer(){
        return $this->belongsTo('App\Flyer');
    }

    public function upload(){

        $this->file->move($this->baseDir, $this->fileName());
        $this->makeThumbnail();
        

        return $this;
    }

    public static function fromFile(UploadedFile $file){

        $photo = new static;

        $photo->file = $file;

        return $photo->fill([
            'name'=>$photo->fileName(),
            'path'=>$photo->filePath(),
            'thumbnail_path'=>$photo->thumbnailPath()
        ]);

    }

    public function fileName(){

        $name = sha1(time() . $this->file->getClientOriginalName());
        $extension = $this->file->getClientOriginalExtension();
        return "{$name}.{$extension}";
    }

    public function filePath(){
        return $this->baseDir . '/' . $this->fileName();
    }

    public function thumbnailPath(){
        return $this->baseDir . '/tn-' . $this->fileName();

    }

    public function makeThumbnail(){
        Image::make($this->filePath())
            ->fit(200)
            ->save($this->thumbnailPath());

    }
}
