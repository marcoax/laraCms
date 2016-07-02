<?php
namespace App\laraCms\Website;
Use App;
use Carbon\Carbon;
class HtmlMenu {

	protected  $html;
	protected  $model;
	protected  $property;

	public function get($model)
	{

		$this->initHtml ( $model );
		echo $this->render();
	}

	public function  render ()
	{

		return $this->html;
	}

	protected   function  initHtml ($model)
	{
		$this->html  = "";
		$this->model = $model;

	}
	
}