<?php
namespace App\LaraCms;
Use Form;
Use App;
use Carbon\Carbon;
use Input;

/* TODO  -> this must be refactor */
class UploadManager {
	protected $media;
    protected $model;

	public function init($media,$model) {
		$this->model = $model;
		$this->media = $media;
		echo  'myFunction is OK'.$media;
		if (Input::hasFile($media) && Input::file($media)->isValid()) {
			$newMedia  = Input::file($media);
			$mediaType = ( is_image( $newMedia->getMimeType()) == 'image') ? 'images':'docs';
			$destinationPath =  config('laraCms.admin.path.repository').'/'.$mediaType; // upload path
			$extension 		 = $newMedia->getClientOriginalExtension(); // getting image extension
			$name 			 = basename($newMedia->getClientOriginalName(),'.'.$extension);
			$fileName 		 = str_slug(rand(11111,99999).'_'.$name).".".$extension; // renameing image
			$newMedia->move($destinationPath, $fileName); // uploading file to given path
			echo $this->model->$media = $fileName;

		}
	}

	/**
	 * Return an array of file details for a file
	 */
	protected function fileDetails($path)
	{
		$path = '/' . ltrim($path, '/');

		return [
			'name' => basename($path),
			'fullPath' => $path,
			'webPath' => $this->fileWebpath($path),
			'mimeType' => $this->fileMimeType($path),
			'size' => $this->fileSize($path),
			'modified' => $this->fileModified($path),
		];
	}

}