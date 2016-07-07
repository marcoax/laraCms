<?php

namespace App\LaraCms\Website\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LaraCms\Website\Requests\WebsiteFormRequest;
use Input;
use Validator;
use App\Contact;
use App\LaraCms\Website\Repos\Article\ArticleRepositoryInterface;

class ApiController extends Controller
{

    protected $articleRepo;


    /**
     * @return mixed
     */

    


    public function subscribeNewsletter( WebsiteFormRequest $request  ) {

     
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
