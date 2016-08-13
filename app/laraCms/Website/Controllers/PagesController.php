<?php

namespace App\laraCms\Website\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\laraCms\Website\Requests\WebsiteFormRequest;
use Illuminate\Support\Str;
use Input;
use Validator;
use App\Article;
use App\News;
use App\Contact;
use App\laraCms\Website\Repos\Article\ArticleRepositoryInterface;
use App\laraCms\Website\Repos\News\NewsRepositoryInterface;

/**
 * Class PagesController
 * @package App\laraCms\Website\Controllers
 */

class PagesController extends Controller

{

    use \App\laraCms\SeoTools\LaraCmsSeoTrait;
    protected $articleRepo;
    protected $newsRepo;
    public function __construct(ArticleRepositoryInterface $article,NewsRepositoryInterface $news)
    {
        $this->articleRepo = $article;
        $this->newsRepo    = $news;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        $article =$this->articleRepo->getBySlug('home');
        $this->setSeo($article);
        return view('website.home',compact('article'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function pages($slug) {
        $article = $this->articleRepo->getBySlug($slug);
        if(!$article) return redirect('');
        $this->setSeo($article);
        $this->template = ( $article->template_id ) ?  $article->template->value  : $slug;
        if (view()->exists('website.'. $this->template)) {
            return view('website.'.$this->template,compact('article'));
        }
        return view('website.normal',compact('article'));
    }

    /**
     * @param string $slug
     * @return \Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function news($slug='') {
        $article = $this->articleRepo->getBySlug('news');;
        if($slug=='') {
            $news = $this->newsRepo->getAll();
            $this->setSeo($article);
            return view('website.news.home',compact('article','news'));
        }
        else {
            $news = $this->newsRepo->getBySlug($slug);
            if(!$news) return redirect('');
            $this->setSeo($news);
            $this->addOpenGraphProperty('type','articles');
            return view('website.news.single',compact('article','news'));
        }
    }
}