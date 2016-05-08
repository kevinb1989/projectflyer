<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the profile page that displays basic information for the user
     * 
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('users.profile');
    }

    /**
     * Show the about page
     * 
     * @return Illuminate\Http\Response
     */
    public function about(){
        return view('pages.about');   
    }

    /**
     * Show the contact page
     * 
     * @return Illuminate\Http\Response
     */
    public function contact(){
        return view('pages.contact');   
    }
}
