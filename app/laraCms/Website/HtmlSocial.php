<?php
namespace App\laraCms\Website;
Use App;
Use App\Social;
use Carbon\Carbon;
class HtmlSocial {

	protected  $html;
	protected  $model;
	protected  $property;

	public function get()
	{

		$this->initHtml ( );
		$this->createSocialBar();
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function  render ()
	{
		return $this->html;
	}

	/**
	 *  init
	 *  for the social bar
	 *
	 */
	protected   function  initHtml ()
	{
		$this->html  = "";
		$this->model =  new App\Social;
	}

	/**
	 *  create the html
	 *  for the social bar
	 *
	 */
	function  createSocialBar(){

		foreach ($this->model->all() as $item ){

			$this->html .= "<li class=\"xx-big\">\n";
				$this->html  .="<a href=\"".$item->link."\" target=\"_new\">\n";
					$this->html  .="<span class=\"fa-stack fa-lg transitioned\">\n";
						$this->html  .="<i class=\"fa fa-circle fa-stack-2x color-6 transitioned\"></i>\n";
						$this->html  .="<i class=\"fa ".$item->icon." fa-stack-1x fa-inverse color-2 transitioned\"></i>\n";
					$this->html  .="</span>\n";
				$this->html .= "</a>\n";
			$this->html .= "</li>\n";
		}
	}
	
}