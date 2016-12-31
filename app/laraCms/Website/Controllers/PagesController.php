<?php

namespace App\LaraCms\Website\Controllers;
use App\FaqCategory;
use App\LaraCms\Website\Repos\Article\ArticleRepositoryInterface;
use App\LaraCms\Website\Repos\News\NewsRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Input;
use Validator;
use App\Article;
use App\News;
use App\Product;
use App\PlantProvenience;
use App\LeafType;
use App\Environment;
use Domain;


class PagesController extends Controller

{
	use \App\LaraCms\SeoTools\LaraCmsSeoTrait;
    /**
     * @var
     */
    protected  $template;
    /**
     * @var ArticleRepositoryInterface
     */
    protected  $articleRepo;
    /**
     * @var NewsRepositoryInterface
     */
    protected  $newsRepo;
    /**
     * @var NewsRepositoryInterface
     *
     *
     */
    private $news;

    /**
     * @param ArticleRepositoryInterface $article
     * @param PostRepositoryInterface $news
     */

    public function __construct(ArticleRepositoryInterface $article,NewsRepositoryInterface $news )
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pages($slug) {
        $article = $this->articleRepo->getBySlug($slug);
        if($article){
            $this->setSeo($article);
            $this->template = ( $article->template_id ) ?  $article->template->value  : $slug;
            if (view()->exists('website.'. $this->template)) {
                return view('website.'.$this->template,compact('article'));
            }
            return view('website.normal',compact('article'));
        }
        else {
            return Redirect::to('/');
        }
    }

    public function test() {
        phpinfo();
        die();
    }

    /**
     * @param int $parameter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contacts($parameter=0) {
        $article = $this->articleRepo->getBySlug('contacts');
		if( $parameter ) {
			return view('website.contacts', ['request_product_id' => $parameter, 'article' => $article]);
		}else{
			return view('website.contacts', ['request_product_id' => 0, 'article' => $article]);
		}
	}

    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function news($slug='') {
        $article = $this->articleRepo->getBySlug('news');

        if($slug=='') {
        	$this->setSeo($article);
            $news = $this->newsRepo->getPublished();
            return view('website.news.home',compact('article','news'));
        }
        else {
            $news = $this->newsRepo->getBySlug($slug);;
            if($news){
                $this->setSeo($news);
                return view('website.news.single',compact('article','news'));
            }
            return Redirect::to('/');
        }
    }



}