<?php
namespace App\laraCms\Website\Repos\News;
/**
 * Created by PhpStorm.
 * User: Marco Asperti
 * Date: 03/07/2016
 * Time: 10:58
 */

use App\laraCms\Website\Repos\DbRepository;
use App\News;
use Carbon\Carbon;
class DbNewsRepository extends DbRepository implements NewsRepositoryInterface
{

    protected $model;
    function  __construct(News $model)
    {
        $this->model = $model;
    }

    function  getAll()
    {

        return $this->model->where('pub', '=',1)->where('date','<=',Carbon::now())->orderBy('date', 'desc')->get();
    }


}