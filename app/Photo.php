<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    //

    protected $fillable = ['path'];

    protected $baseDir = 'flyers/photos';

    public static function fromForm(UploadedFile $file){
        $photo = new static;

        $name = time() . $file->getClientOriginalName();

        $photo->path = $photo->baseDir . '/' . $name;

        $file->move($photo->baseDir, $name);

        return $photo;
    }
}
