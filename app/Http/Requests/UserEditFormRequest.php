<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserEditFormRequest extends Request
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
     */ public function rules()

	{

		 return [
            'name' => 'required',
            'email'=> 'required',
          
            'password'=>'alpha_num|min:6|confirmed',
            'password_confirmation'=>'alpha_num|min:6',
        ];
	
		foreach($this->request->get('role') as $key => $val)
		{
			$rules['role.'.$key] = 'required';
		}

		return $rules;

	}

	}
