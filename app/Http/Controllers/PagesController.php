<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebsiteFormRequest;
use Illuminate\Support\Str;
use Input;
use Validator;
use App\Article;
use App\News;
use App\Contact;

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
    public function getContactUsForm( WebsiteFormRequest $request  ) {
        $slug = 'contact';
        $this->request = $request;
        $model = new  Contact;
        foreach ($model->getFillable() as $a) {
            $model->$a = $this->request->get($a);
        }
        $model->save();
        $article = Article::where('slug','=',$slug)->first();
        flash()->success(trans('website.message.contact_feedback'));
        return view('website.feedback',compact('article'));
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
