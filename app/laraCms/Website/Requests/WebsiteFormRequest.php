<?php

namespace App\LaraCms\Website\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Input;

class WebsiteFormRequest extends FormRequest
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
