<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
	
	
	public function responseHandler()
    {
        	
		return response()->json($this->responseContainer);
    }
}
