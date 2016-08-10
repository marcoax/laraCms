<?php
/**
 * Created by PhpStorm.
 * User: Marco Asperti
 * Date: 03/07/2016
 * Time: 11:21
 */
namespace App\LaraCms\Website\Repos\Article;
/**
 * Interface ArticleRepositoryInterface
 * @package App\LaraCms\Website\Repos\Article
 */
interface ArticleRepositoryInterface
{
    public function getBySlug($slug);
}