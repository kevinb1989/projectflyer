<?php

namespace App;

class Thumbnail {
	public function make($src, $destination){
		\Image::make($src)
			->fit(200)
			->save($destination);
	}
}