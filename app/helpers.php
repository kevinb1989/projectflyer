<?php

function flash($message){
	$flash = app('App\Http\Flash');

	return $flash->message($message);
}