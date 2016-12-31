<?php

namespace App\LaraCms\Admin\Controllers;


use App\Article;
use App\LaraCms\Tools\ExportHelper;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

use Maatwebsite\Excel\Facades\Excel;
use Validator;


/**
 * Class AdminExportController
 * @package App\LaraCms\Admin\Controllers
 */
class AdminExportController extends Controller
{
    protected $model;
    protected $models;
    protected $modelClass;
    protected $curObject;
    protected $request;
    protected $config;
    protected $id;


    /**
     * @param Request $request
     * @param $model
     * @param string $sub
     */
    public function lista(Request $request, $model, $sub = '')
    {

        $ExportHelper = new  ExportHelper();
        $itemsArray = $ExportHelper->init($model)->getDataToExport();
        Excel::create($ExportHelper->getFileName(), function ($excel) use ($itemsArray) {
            // Convert each member of the returned collection into an array,
            // and append it to the payments array.
            $excel->sheet('First sheet', function ($sheet) use ($itemsArray) {
                $sheet->fromArray($itemsArray, null, 'A1', false, false);
            });

        })->export('csv');
    }
}
