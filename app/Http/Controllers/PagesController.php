<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Input;
use Validator;

class PagesController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }


	public function team() {

		return view('fe.team');
	}

}
