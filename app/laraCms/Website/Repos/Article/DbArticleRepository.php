<?php
namespace App\LaraCms\Website\Repos\Article;
/**
 * Created by PhpStorm.
 * User: Marco Asperti
 * Date: 03/07/2016
 * Time: 10:58
 */
use App\Article;
use App\LaraCms\Website\Repos\DbRepository;
class DbArticleRepository extends DbRepository implements ArticleRepositoryInterface
{

    protected $model;
    function  __construct(Article $model)
    {
        $this->model = $model;
    }


}