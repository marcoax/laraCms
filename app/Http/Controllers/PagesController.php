<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Input;
use Validator;
use App\Article;
use App\News;

class PagesController extends Controller
{
    public function home()
    {
        $article = Article::where('slug','=','home')->first();
        return view('website.home',compact('article'));
    }

    public function pages($slug) {
        $article = Article::where('slug','=',$slug)->first();
        //$article =  $article->translateOrDefault(config('app.locale'));
        if (view()->exists('website.'.$slug)) {
            return view('website.'.$slug,compact('article'));
        }
        return view('website.normal',compact('article'));
    }

    public function news($slug='') {
        $article = Article::where('slug','=','news')->first();
        if($slug=='') {
            $news = News::published()->get();
            return view('website.news',compact('article','news'));
        }
        else {
            $news = News::where('slug','=',$slug)->first();;
            return view('website.news_single',compact('article','news'));
        }
    }
}
