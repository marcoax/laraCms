<?php

namespace App\LaraCms\Website\Controllers;



use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LaraCms\Website\Requests\AjaxFormRequest;
use Input;
use Validator;


class ApiController extends Controller
{

    protected $articleRepo;


    /**
     * @return mixed
     */

    


    public function subscribeNewsletter( AjaxFormRequest $request  ) {

     
        $validator = Validator::make($request->all(), $request->rules());
        // check if the validator failed -----------------------
        if ($validator->fails()) {
            return response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ));

        }
        else return response()->json(array(
            'status' =>'ok',
            'msg' => 'ok'
        ));

    }

}
