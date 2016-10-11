<?php

namespace App\laraCms\Admin\Controllers;

use App\laraCms\Sluggable\SluggableTrait;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\laraCms\Admin\Requests\AdminFormRequest;
use Input;
use Validator;
use App\laraCms\UploadManager;
Use Excel;


/**
 * Class ExportController
 * @package App\laraCms\Admin\Controllers
 */
class ExportController  extends Controller
{

    protected $model;
    protected $models;
    protected $modelClass;
    protected $curObject;
    protected $request;
    protected $config;
    protected $id;
    use SluggableTrait;


    /**
     * @param $model
     */
    public function init($model)
    {
        $this->model = $model;
        $this->config = config('laraCms.admin.list.section.' . $this->model);
        $this->models = strtolower(str_plural($this->config['model']));
        $this->modelClass = 'App\\' . $this->config['model'];
    }

    /**
     * @param $model
     */
    public function model($model)
    {
        $this->init($model);
        $this->model;

        Excel::create('pino', function($excel) {

            $excel->sheet('Sheetname', function($sheet) {
                $this->modelClass = 'App\\Article';
                $model = new  $this->modelClass;
                $sheet->fromModel($model::all());

            });
        })->export('csv');
    }
}