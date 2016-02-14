<?php

namespace App\LaraCms\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Media;
use Input;
use Image;

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
			
		$modelClass  =  'App\\'.ucFirst($model);
		$object 	 = $modelClass::whereId($id)->first();
		if( is_object($object) ) {
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
			$name 			 = basename($newMedia->getClientOriginalName(),'.'.$extension);
			$fileName 		 = str_slug(rand(11111,99999).'_'.$name).".".$extension; // renameing image
			//$newMedia->move($destinationPath, $fileName); // uploading file to given path



			$storage = \Storage::disk('media');
			$storage->put($destinationPath.'/'.$fileName, file_get_contents($newMedia), 'public');
            if ( is_image( $newMedia->getMimeType()) == 'image') {

				//$img = Image::make($newMedia->getRealPath());
				$img = Image::make( public_path('media/'.$destinationPath.'/'.$fileName))->widen(1600);
				// save file as png with medium quality
				$img->save(public_path('media/'.$destinationPath.'/'.$fileName, 60));
			}
			$modelClass  =  'App\\'.$request->model;
			$list = $modelClass::find($request->Id);

			$c = new Media;
			$c->title      = $fileName;
			$c->file_name  = $fileName;
			$c->size 	   = $newMedia->getClientSize();
			$c->collection_name = $mediaType;
			$c->disk	   = $destinationPath;
			$c->media_category_id = $request->myImgType;
			$c->file_ext = $extension;
			$list->media()->save($c);
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

	public function updateMediaSortList(Request $request)
	{
        $i =1;

			$input = Input::all();
			foreach($input as $key => $items) {
				$dataObject = explode( '_',$key);
				foreach($items as $id) {
					$modelClass  =  'App\\'.$dataObject[1];
					$object 	 = $modelClass::whereId($id)->firstOrFail();
					$object->sort = $i*10;
					$object->save();
					$i++;
				};
			};



	}

	public function responseHandler()
    {
        	
		return response()->json($this->responseContainer);
    }
}
