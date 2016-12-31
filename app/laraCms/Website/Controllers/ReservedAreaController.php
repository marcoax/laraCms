<?php

namespace App\LaraCms\Website\Controllers;
use App\FaqCategory;
use App\LaraCms\Website\Repos\Article\ArticleRepositoryInterface;
use App\LaraCms\Website\Repos\News\NewsRepositoryInterface;
use App\Http\Requests;
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


class ReservedAreaController extends Controller

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
     * @param ArticleRepositoryInterface $article
     *
     */

    public function __construct(ArticleRepositoryInterface $article )
    {
        $this->articleRepo = $article;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {
        $article =$this->articleRepo->getBySlug('user-dashboard');
        $this->setSeo($article);
        return view('website.users.dashboard',compact('article'));
    }
    public function profile()
    {

        $article =$this->articleRepo->getBySlug('user-profile');
        $this->setSeo($article);
        return view('website.users.profile',compact('article'));
    }
}