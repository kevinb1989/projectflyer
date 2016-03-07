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

    public static function named(UploadedFile $file){
        
        return (new static)->saveAs($file->getClientOriginalName());

        
    }

    protected function saveAs($name){
        $this->name = sprintf('%s-%s', time(), $name);
        $this->path = sprintf('%s/%s', $this->baseDir, $this->name);
        $this->thumbnail_path = sprintf('%s/tn_%s', $this->baseDir, $this->name);
        return $this;
    }

    public function move(UploadedFile $file){

        $file->move($this->baseDir, $this->name);
        Image::make($this->path)
            ->fit(200)
            ->save($this->thumbnail_path);

        return $this;

    }
}
