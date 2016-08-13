<?php

namespace App\laraCms\Admin\Requests;

use App\Http\Requests\Request;
use Input;

class AdminFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       
	   $model= ( $this::segment(2)=='create')? $this::segment( count( $this::segments() )) : $this::segment( count( $this::segments() )-1) ;
	   $rules =  config('laraCms.admin.form_validation.'.$model);
	  
  	 return $rules;

    }
}
