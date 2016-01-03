<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Media;
use Input;

class AjaxController extends Controller
{
    	
    private 	$responseContainer = ['status'=>'ko','message'=>'','error'=>'','data'=>''];
	protected   $request;

	
	public function update($action,$model,$id='',Request $request)
    {
		$this->request = $request;
		switch ($action) {
		    case "updateItemField":
		        
		        if($this->request->input('field')) {
		        	
		        	$field  	 =  $this->request->input('field');
					$value  	 =  $this->request->input('value');
					$modelClass  =  'App\\'.$model;
					$object 	 = $modelClass::whereId($id)->firstOrFail();
					$object->$field = $value;
					$object->save();
					$this->responseContainer['status']  ='ok';
					$this->responseContainer['message'] ='data has been update';
					$this->responseContainer['data']    = $object;
				}

		        break;
		   
		}	
		return $this->responseHandler();
    }
	
	
	public function delete($model,$id='')
    {
			
		$modelClass  =  'App\\'.$model;
		$object 	 = $modelClass::whereId($id)->firstOrFail();
		if( $object ) {
			$object->delete();
			$this->responseContainer['status']  ='ok';
			$this->responseContainer['message'] ='data has been deleted';
		}
		else $this->responseContainer['error'] ='data not found';
		return $this->responseHandler();
    }

	public function uploadifive(Request $request)
	{

		$media = 'Filedata';

		if (Input::hasFile($media) && Input::file($media)->isValid()) {
			$newMedia  = Input::file($media);
			$mediaType = ( is_image( $newMedia->getMimeType()) == 'image') ? 'images':'docs';
			$destinationPath =  $mediaType; // upload path folder
			$extension 		 = $newMedia->getClientOriginalExtension(); // getting image extension
			$name 			 = $newMedia->getClientOriginalName();
			$fileName 		 = rand(11111,99999).'_'.$name; // renameing image
			//$newMedia->move($destinationPath, $fileName); // uploading file to given path



			$storage = \Storage::disk('media');
			$storage->put($destinationPath.'/'.$fileName, file_get_contents($newMedia), 'public');

			$modelClass  =  'App\\'.$request->model;
			$list = $modelClass::find($request->Id);

			$c = new Media;
			$c->title      = $fileName;
			$c->file_name  = $fileName;
			$c->size 	   = $newMedia->getClientSize();
			$c->collection_name = $mediaType;
			$c->disk	   = $destinationPath;
			$c->media_category_id = $request->myImgType;
			$list->medias()->save($c);
			$this->responseContainer['status']  ='ok';
			$this->responseContainer['data'] =$mediaType;
			return $this->responseHandler();
		}
	}


	public function updeteMediaList($mediaType,$model,$id='')
	{

		$modelClass  =  'App\\'.$model;
		$object 	 = $modelClass::whereId($id)->firstOrFail();
		if( $mediaType == 'images' ) return view('admin.helper.images_list_gallery', ['article' => $object]);
		else return view('admin.helper.docs_list', ['article' => $object]);
	}

	public function responseHandler()
    {
        	
		return response()->json($this->responseContainer);
    }
}
