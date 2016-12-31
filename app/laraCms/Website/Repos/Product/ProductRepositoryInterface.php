<?php
/**
 * Created by PhpStorm.
 * User: Marco Asperti
 * Date: 03/07/2016
 * Time: 11:21
 */
namespace App\LaraCms\Website\Repos\Product;

/**
 * Interface ProductRepositoryInterface
 * @package App\LaraCms\Website\Repos\Product
 */
interface ProductRepositoryInterface
{
    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug);

    /**
     * @return mixed
     */
    public function getPublished();
}