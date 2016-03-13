<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Flyer;
use App\AddPhotoToFlyer;

class PhotosController extends Controller
{
    //
    public function store($zip, $street, Request $request){
        $this->validate($request, [
                'photo' => 'required|mimes:jpg,jpeg,bmp,png'
            ]);

        $flyer = Flyer::locatedAt($zip, $street);

        if(!$flyer->ownedBy(\Auth::user())){

            return $this->unauthorized($request);

        }
        $photo = $request->file('photo');

        (new AddPhotoToFlyer($flyer, $photo))->save();

        return 'Uploaded';
    }
}
