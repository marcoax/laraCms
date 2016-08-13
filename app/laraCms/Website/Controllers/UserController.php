<?php
/**
 * Created by PhpStorm.
 * User: Marco Asperti
 * Date: 07/08/2016
 * Time: 11:53
 */

namespace App\laraCms\Website\Controllers;

use App\laraCms\SeoTools\LaraCmsSeoTrait;
use App\laraCms\Website\Repos\Article\ArticleRepositoryInterface;
use App\Http\Controllers\Controller;
use Input;
use Validator;

class UserController extends Controller
{
    use LaraCmsSeoTrait;
    public function __construct(ArticleRepositoryInterface $article)
    {
        $this->articleRepo = $article;

    }
    public function dashboard()
    {
        $article =$this->articleRepo->getBySlug('home');
        $this->setSeo($article);
        return view('website.users.dashboard',compact('article'));
    }

    public function profile()
    {
        $article =$this->articleRepo->getBySlug('about');
        $this->setSeo($article);
        return view('website.users.profile',compact('article'));
    }
}