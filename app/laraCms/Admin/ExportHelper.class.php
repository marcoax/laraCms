<?php namespace App\LaraCms\Tools;


/**
 * Class ExportHelper
 * @package App\LaraCms\Tools
 */
class ExportHelper {

	/**
	 * @var
     */
	protected $model;
	/**
	 * @var
     */
	protected $models;
	/**
	 * @var
     */
	protected $modelClass;
	/**
	 * @var
     */
	protected $config;
	/**
	 * @var array
     */
	protected $itemsArray= array();
	/**
	 * @var array
     */
	protected $labelArray= array();

	/**
	 * @var
	 */
	protected $fileName;

	/**
	 * @param $model
	 * @return $this
     */
	public function init($model)
	{
		$this->model = $model;
		$this->config = config('laraCms.admin.list.section.' . $this->model);
		$this->models = strtolower(str_plural($this->config['model']));
		$this->modelClass = 'App\\' . $this->config['model'];
		$this->setFilename($this->config['model'].'_'.date('Y-m-d'));
		return $this;
	}

	/**
	 * @return array
     */
	public function   getDataToExport(){
		// Define the Excel spreadsheet headers
		$this->itemsArray[] = $this->setHeader();
		$model = new  $this->modelClass;
		$items = $model::get();
		foreach($items as  $item){
			$this->itemsArray[] = $this->getCurItemData($item);
		}
		return $this->itemsArray;
	}

	/**
	 * @return mixed
	 */
	public function getFileName()
	{
		return $this->fileName;
	}


	public function   setFilename( $name ){

		$this->fileName = $name ;
		return $this;
	}


	/**
	 * @return array
     */
	protected   function setHeader(){

     	foreach( $this->config['field_exportable'] as $field ) {
			array_push( $this->labelArray,$field['label']);
		}
		return $this->labelArray;
	}

	/**
	 * @param $item
	 * @return mixed
     */
	protected   function getCurItemData($item){
		$dataArray = array();
		foreach( $this->config['field_exportable'] as $field ) {
            $a = $field['field'];
			if($field['type']=='text')	array_push( $dataArray,$item->$a);
			if($field['type']=='relation')  {
				if(isset($item->{$field['relation']}->{$field['field']})) array_push( $dataArray,$item->{$field['relation']}->{$field['field']});
			    else  array_push( $dataArray,'');
			}
			if($field['type']=='integer')	array_push( $dataArray,$item->$a);
			if($field['type']=='datetime')	array_push( $dataArray,$item->$a->format('m-d-Y h:m'));
		}
		return $dataArray;
	}
}
