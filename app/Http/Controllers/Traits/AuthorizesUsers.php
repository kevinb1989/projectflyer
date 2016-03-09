<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use App\Flyer;

trait AuthorizesUsers{

protected function unauthorized(Request $request){

        if($request->ajax()){
                return response(['Unauthorized'], 403);
            }

            flash('No way.');

            return redirect('/');

    }
	
}