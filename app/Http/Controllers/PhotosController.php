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
    /**
     * save a photo to server
     * 
     * @param  string $zip
     * @param  string $street
     * @param  Illuminate\Http\Request $request
     * @return string
     */
    public function store($zip, $street, Request $request){

        //validate the request
        $this->validate($request, [
                'photo' => 'required|mimes:jpg,jpeg,bmp,png'
            ]);

        //locate the flyer based on the zip code and street name
        $flyer = Flyer::locatedAt($zip, $street);

        //make sure the flyer is owned by the current authenticated user.
        if(!$flyer->ownedBy(\Auth::user())){

            return $this->unauthorized($request);

        }
        $photo = $request->file('photo');

        //save the photo to our system
        (new AddPhotoToFlyer($flyer, $photo))->save();

        return 'Uploaded';
    }
}
