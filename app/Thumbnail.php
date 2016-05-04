<?php

namespace App;

class Thumbnail {

	/**
	 * Read and save images uploaded by clients to server
	 * 
	 * @param  string src the original source of the image
	 * @param  string destination the directory the save the image in the server
	 * @return void
	 */
	public function make($src, $destination){
		\Image::make($src)
			->fit(200)
			->save($destination);
	}
}