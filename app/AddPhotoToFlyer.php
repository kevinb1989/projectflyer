<?php

namespace App;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AddPhotoToFlyer{

	/**
	 * The flyer that photos and thumbnails are uploaded to
	 * 
	 * @var App\Flyer
	 */
	protected $flyer;

	/**
	 * the file (photo) that is going to be uploaded
	 * 
	 * @var UploadedFile
	 */
	protected $file;

	/**
	 * the Thumbnail that is going to be uploaded
	 * 
	 * @var [type]
	 */
	protected $thumbnail;

	/**
	 * Inject a flyer, a file (photo) and a thumbnail to the constructor
	 * 
	 * @param Flyer
	 * @param UploadedFile
	 * @param Thumbnail|null
	 */
	public function __construct(Flyer $flyer, UploadedFile $file, Thumbnail $thumbnail = null){
		$this->flyer = $flyer;
		$this->file = $file;
		$this->thumbnail = $thumbnail ?: new Thumbnail;
	}

	/**
	 * This function actually do 3 jobs:
	 * First, it saves a photo object to the database via the flyer
	 * Then it moves the actual photo to a specified directory
	 * Finally, it makes a thumbnail for the photo
	 * 
	 * @return void
	 */
	public function save(){
		//attach the photo to the flyer
		$photo = $this->flyer->addPhoto($this->makePhoto());
		//move the photo to the images folder
		$this->file->move($photo->baseDir(), $photo->name);
		//generate a thumbnail
		$this->thumbnail->make($photo->path, $photo->thumbnail_path);
	}

	/**
	 * Initialize an App\Photo object with a name
	 * 
	 * @return App\Photo
	 */
	public function makePhoto(){

		return new Photo([
				'name'=>$this->makeFileName()
			]);
	}

	/**
	 * create a name for the photo, which is a random string.
	 * 
	 * @return string
	 */
	public function makeFileName(){
		$name = sha1(time() . $this->file->getClientOriginalName());
        $extension = $this->file->getClientOriginalExtension();
        return "{$name}.{$extension}";
	}
	
}