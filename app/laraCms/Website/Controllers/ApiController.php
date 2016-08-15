<?php

namespace App\laraCms\Website\Controllers;

use App\Events\Registration\NewsletterSubscribe;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\laraCms\Website\Requests\AjaxFormRequest;
use App\Newsletter;
use Input;
use Validator;

class ApiController extends Controller
{

    /**
     * @var
     */
    protected $articleRepo;

    /**
     * @param AjaxFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribeNewsletter(AjaxFormRequest $request)
    {
        $validator = Validator::make($request->all(), $request->rules());
        // check if the validator failed -----------------------
        if ($validator->fails()) {
            return response()->json(array(
                'status' => 'ko',
                'errors' => $validator->getMessageBag()->toArray()
            ));
        } else
        {
            /*
             *  INSERT RECORD IN DB AND NOTIFY SUBSCRIPTION
             *  @event App\Events\Registration\NewsletterSubscribe
             */
            $newsletter  = Newsletter::addToDefaultList($request->email);
            return response()->json(array(
                'status' =>'ok',
                'msg' => trans('website.newsletter_subscribe_ok'),
            ));
        }
    }
}