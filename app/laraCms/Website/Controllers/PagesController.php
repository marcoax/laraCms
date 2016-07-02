<?php

namespace App\LaraCms\Website\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LaraCms\Website\Requests\WebsiteFormRequest;
use Illuminate\Support\Str;
use Input;
use Validator;
use App\Article;
use App\News;
use App\Contact;



class PagesController extends Controller

{

    use \App\laraCms\SeoTools\laraCmsSeoTrait;

    public function home()
    {
        $article = Article::where('slug','=','home')->first();
        $this->setSeo($article);    
        return view('website.home',compact('article'));
    }

    public function pages($slug) {

      
        $article = Article::where('slug','=',$slug)->first();
        //$article =  $article->translateOrDefault(config('app.locale'));
        $this->setSeo($article);
        if (view()->exists('website.'.$slug)) {
            return view('website.'.$slug,compact('article'));
        }
        return view('website.normal',compact('article'));
    }


    public function news($slug='') {
        $article = Article::where('slug','=','news')->first();
        if($slug=='') {
            $news = News::published()->get();
            $this->setSeo($article);
            return view('website.news',compact('article','news'));
        }
        else {
            $news = News::where('slug','=',$slug)->first();
            $this->setSeo($news);
            $this->addOpenGraphProperty('type','articles');
            return view('website.news_single',compact('article','news'));
        }
    }
}
