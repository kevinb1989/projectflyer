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
use Auth;
use App\Http\Controllers\Traits\AuthorizesUsers;


class FlyersController extends Controller
{
    use AuthorizesUsers;

    public function __construct(){
        $this->middleware('auth', ['except' => ['show', 'index']]);

        parent::__construct();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $flyers = Flyer::latest()->paginate(9);
        return view('flyers.index', compact('flyers'));
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
        $flyer = Auth::user()->publish(new Flyer($request->all()));

        flash('The flyer is created successfully!');

        return redirect($flyer->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //$flyer = Flyer::locatedAt($zip, $street);
        $flyer = Flyer::findOrFail($id);
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

    /**
     * Show all flyers of the currently authenticated user
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUserFlyers()
    {
        $flyers = Auth::user()->flyers()->latest()->paginate(5);

        return view('flyers.user-flyers', compact('flyers'));
    }
}
