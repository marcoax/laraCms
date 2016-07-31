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
use App\LaraCms\Website\Repos\Article\ArticleRepositoryInterface;
use App\LaraCms\Website\Repos\Post\NewsRepositoryInterface;


class PagesController extends Controller

{

    use \App\laraCms\SeoTools\LaraCmsSeoTrait;


    protected $articleRepo;
    protected $newsRepo;

    /**
     * @return mixed
     */

    public function __construct(ArticleRepositoryInterface $article,NewsRepositoryInterface $news)
    {
        $this->articleRepo = $article;
        $this->newsRepo    = $news;
    }

    public function home()
    {
        $article =$this->articleRepo->getBySlug('home');
        $this->setSeo($article);
        return view('website.home',compact('article'));
    }

    public function pages($slug) {

        $article = $this->articleRepo->getBySlug($slug);
        if(!$article) return redirect()->guest('');
        $this->setSeo($article);

        if (view()->exists('website.'.$slug)) {
            return view('website.'.$slug,compact('article'));
        }
        return view('website.normal',compact('article'));
    }

    public function pino() {

        return redirect()->guest('');
    }


    public function news($slug='') {
        $article = $this->articleRepo->getBySlug('news');;
        if($slug=='') {
            $news = $this->newsRepo->getAll();
            $this->setSeo($article);
            return view('website.news',compact('article','news'));
        }
        else {
            $news = $this->newsRepo->getBySlug($slug);
            if(!$news) return redirect()->guest('');
            $this->setSeo($news);
            $this->addOpenGraphProperty('type','articles');
            return view('website.news_single',compact('article','news'));
        }
    }
}
