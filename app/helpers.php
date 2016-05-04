<?php

/**
 * Show a flash message to users
 * 
 * @param  string message
 * @return flash
 */
function flash($message){
	$flash = app('App\Http\Flash');

	return $flash->message($message);
}