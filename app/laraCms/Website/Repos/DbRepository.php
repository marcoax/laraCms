<?php
/**
 * Created by PhpStorm.
 * User: Marco Asperti
 * Date: 03/07/2016
 * Time: 11:40
 */
namespace App\LaraCms\Website\Repos;
use Carbon\Carbon;

/**
 * Class DbRepository
 * @package App\LaraCms\Website\Repos
 */
abstract class DbRepository
{

    /**
     * @var News
     */
    protected $model;

    /**
     * DbRepository constructor.
     * @param $model
     */
    function  __construct($model)
    {
        $this->model = $model;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug){
        return $this->model->where('slug','=',$slug)->where('pub', 1)->first();
    }
    /**
     * @return mixed
     */
    function  getPublished()
    {
        return $this->published()->where('date','<=',Carbon::now())->orderBy('date', 'desc')->get();
    }

    /**
     * @return mixed
     */
    public function published()    {
        return $this->model->where('pub', '=',1);
    }
}
