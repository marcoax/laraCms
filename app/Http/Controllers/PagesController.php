<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Input;
use Validator;
use App\Article;

class PagesController extends Controller
{
    public function home()
    {

        return view('admin.home');
    }


	public function team() {
        $article = Article::where('slug','=','team')->first();

		return view('fe.team',compact('article'));
	}

    public function pages($slug) {
        $article = Article::where('slug','=',$slug)->first();
        //$article =  $article->translateOrDefault(config('app.locale'));
        if (view()->exists('fe.'.$slug)) {
            return view('fe.'.$slug,compact('article'));
        }
        return view('fe.normal',compact('article'));
    }
}
