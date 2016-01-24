<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;

class WebsiteFormRequest extends Request
{
    protected $model; /*************  cur model to validate **************/
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
        $segments = $this::segments();
        $this->model= end( $segments  ) ;
        $rules =  config('laraCms.website.form_validation.'.$this->model);
        return $rules;
    }
}
