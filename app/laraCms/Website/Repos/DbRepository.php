<?php
/**
 * Created by PhpStorm.
 * User: Marco Asperti
 * Date: 03/07/2016
 * Time: 11:40
 */

namespace App\laraCms\Website\Repos;

abstract class DbRepository
{

    protected $model;
    function  __construct(News $model)
    {
        $this->model = $model;
    }
    public function getBySlug($slug){
        return $this->model->where('slug','=',$slug)->first();
    }
}