<?php
/**
 * Created by PhpStorm.
 * User: Marco Asperti
 * Date: 03/07/2016
 * Time: 11:21
 */
namespace App\LaraCms\Website\Repos\Post;

interface NewsRepositoryInterface
{
    public function getBySlug($slug);
    public function getAll();
}