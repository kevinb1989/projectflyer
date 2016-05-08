<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('showassets', function () {
    return link_to_asset('/css/app.css');
});

Route::get('show_first_photo', function () {
    return dd(url(App\Flyer::find(1)->photos()->first()->path));
});







/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //home, about and contact pages
    Route::get('/', [
        'as' => 'home_path',
        'uses' => 'PagesController@index'
    ]);
    
    Route::get('about', [
        'as' => 'about_path',
        'uses' => 'PagesController@about'
    ]);

    Route::get('contact', [
        'as' => 'contact_path',
        'uses' => 'PagesController@contact'
    ]);

    

    //profile pages
    Route::get('users/profile', 'PagesController@profile');
    Route::get('users/profile/my-flyers', 'FlyersController@indexUserFlyers');

    //routes of flyers
    Route::resource('flyers', 'FlyersController');
    //Route::get('{zip}/{street}', 'FlyersController@show');
	Route::post('{flyerId}/photos', 'PhotosController@store');

    // Authentication Routes...
    Route::auth();
    
    
    
});







