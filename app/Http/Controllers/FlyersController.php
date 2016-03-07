<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Utilities\Country;
use App\Http\Requests;
use App\Http\Requests\FlyerRequest;
use App\Http\Controllers\Controller;
use App\Flyer;
use App\Photo;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class FlyersController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return 'flyers index page';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $countries = Country::all();
        return view('flyers.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlyerRequest $request)
    {
        //
        Flyer::create($request->all());

        flash('Flyer created successfully!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $zip
     * @param  string $street
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street)
    {

        $flyer = Flyer::locatedAt($zip, $street);
        return view('flyers.show', compact('flyer'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addPhotos($zip, $street, Request $request){
        $this->validate($request, [
                'photo' => 'required|mimes:jpg,jpeg,bmp,png'
            ]);

        //$name = time() . $file->getClientOriginalName();

        //$file->move('flyers/photos', $name);

        $flyer = Flyer::locatedAt($zip, $street);

        $photo = $this->makePhoto($request->file('photo'));

        

        $flyer->addPhoto($photo);

        //$flyer->photos()->create(['path'=>'flyers/photos/'.$name]);

        return 'Uploaded';
    }

    public function makePhoto(UploadedFile $file){

        return Photo::named($file)->move($file);

    }
}
