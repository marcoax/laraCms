<?php
namespace App\LaraCms\Admin;
Use Form;
Use App;
use Carbon\Carbon;

/**
 * Class AdminForm
 * @package App\LaraCms\Admin
 */
class AdminList {

	/**
	 * @var
     */
	protected  $html;
	/**
	 * @var
     */
	protected  $property;
	/**
	 * @var
     */
	protected  $listLabel;

	/**
	 * @param $property
	 * @return $this
     */
	public  function  initList ($property)
	{
		$this->html ="";
		$this->property = $property;
		return $this;
    }

	/**
	 *
	 */
	public function getListHeader(  )
	{

		$this->listLabel  = explode(',',$this->property['fieldLabel']);
		$html  = '';
		$html .= $this->getSelectAbleHeader();
		$nF    = 0; //  field number
		foreach( $this->listLabel as $itemLabel){
			$html   .= "<th class=\"middle-vertical-align\">\n";
				$html  .= $itemLabel;
				$html  .= $this->getOrderableField( $nF );
			$html  .= "</th>\n";
			$nF++;
		}

		echo $html;
	}


	/**
	 * @return string
     */
	protected   function getSelectAbleHeader(){
		return ($this->property['selectable']==1) ? "<th class=\"middle-vertical-align\"></th>\n" :'';
    }


	/**
	 * @param $i
	 * @return string
     */
	protected   function getOrderableField($i ){
		$nF   = 0;
		$html = '';
		foreach($this->property['field']  as $item) {
			if( $i == $nF  && $this->fieldIsOrderable( $item )) {
				$curField = (is_array($item)) ? $item['field'] : $item;
				$html .= " <a href=\"?orderBy=$curField&orderType=desc\"><i class=\"fa fa-arrow-down\" aria-hidden=\"true\"></i></a>\n";
				$html .= " <a href=\"?orderBy=$curField&orderType=asc\"><i class=\"fa fa-arrow-up\" aria-hidden=\"true\"></i></a>\n";
			}
			$nF++;
		}
		return $html;
	}
	/**
	 * @param $item
	 * @return bool
     */
	protected   function fieldIsOrderable($item ){
		return  (isset($item['orderable'])) ? $item['orderable'] : false;
	}
}
