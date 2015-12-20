<?php
namespace App\Helpers;
Use Form;
Use App;
class AdminForm {

    protected  $html;
	protected  $property;
	
    public function get($model)
    {
       $this->initForm ( $model );	
       print_r( $this->render() );
    }
	
	
	public function  render ()
    {
      
	  return $this->html;
    }
	
	protected   function  initForm ($model)
    {
       	
		foreach( $model->getFieldSpec() as $key => $property ) {
			$this->formModelHandler( $model,$property,$key,$model->$key);
		}

		if(isset($model->translatedAttributes ) && count($model->translatedAttributes )>1) {
			$model->fieldspec = $model->getFieldSpec ();
			foreach (config('app.locales') as $locale => $value) {
				if(config('app.locale')!= $locale){
					$this->html .= $this->containerLanguage($value);
					$this->html .="<div id=\"language_box_".$locale."\">";
					foreach($model->translatedAttributes as $attribute) {
						$value = (isset($model->translate($locale)->$attribute))? $model->translate($locale)->$attribute:'';
						$this->property = $model->fieldspec[$attribute];
						$this->formModelHandler( $model,$model->fieldspec[$attribute],$attribute.'_'.$locale,$value);
					}
					$this->html .="</div>";
				}

			}
		}
  }

	private function  formModelHandler( $model,$property,$key,$value='') {
		$this->property  = $property;
		$cssClass        = (isset( $this->property['cssClass']))?$this->property['cssClass'] :' ';
		$cssClassElement = (isset( $this->property['cssClassElement']))?$this->property['cssClassElement'] :' col-md-10';
		$isLangField     = (isset($this->property['lang']) && $this->property['lang']== 1) ? true: false;
		$formElement     = '';
		if( $isLangField  ||  $this->property['display'] != 1 ) { }
		else if($this->property['type'] =='string' ) {
			$formElement = Form::text($key, $value , array('class' => ' form-control '.$cssClass));

		}
		else if($this->property['type'] =='integer'  && $this->property['display']== 1) {
			$cssClassElement  = 'col-md-4';
			$formElement = Form::text($key, $value , array('class' => ' form-control '.$cssClass));

		}

		else if($this->property['type'] =='text'  && $this->property['display']== 1) {
			$formElement = Form::textarea($key, $value.'' , array('class' => 'form-control '.$cssClass));

		}
		else if($this->property['type'] =='boolean'  && $this->property['display']== 1) {
			//$formElement = Form::checkbox($key, 1 , $model->$key );
			$activeNo=($value!='1')?' active':'';
			$activeYes=($value	=='1')?'active':'';
			$formElement.="<div class=\"btn-group\" data-toggle=\"buttons\">\n";
			$formElement.=' <label class="btn btn-default '.$activeYes.'" onclick="$(\'#'.$key.'\').val(1)">
									<input type="radio"  name="options"  autocomplete="off" '.$activeYes.'>'.trans('admin.label.btn_yes').'
								</label>';
			$formElement.=' <label class="btn btn-default '.$activeNo.'" onclick="$(\'#'.$key.'\').val(0)">
									<input type="radio"  name="options"  autocomplete="off" '.$activeNo.'> '.trans('admin.label.btn_no').'
								</label>';
			$formElement.="</div>\n";
			$formElement .= Form::hidden($key, $value , array('id'=> $key,'class' => ' form-control '.$cssClass));

		}
		else if($this->property['type'] =='media'  && $this->property['display']== 1) {
			$formElement = Form::file($key)	;
			$cssClassElement  = 'col-md-4';

		}
		else if($this->property['type'] =='relation'  && $this->property['display']== 1) {

			$objRelation = $this->getRelation();
			$selected = ( isset( $this->property['relation_name'] ) && $this->property['relation_name']!='') ? $model->{$this->property['relation_name']}->lists('id')->toArray():'';
			$formElement   = $this->getComboRelation( $objRelation,$key,$value,$selected);

		}
		if ( $formElement  && $this->property['type'] =='media') $this->html .= $this->containerMedia($formElement, $cssClassElement,$model,$key);
		else if( $formElement) $this->html .= $this->container($formElement, $cssClassElement  );

	}



	function container($formElement,$cssClass="" ){
		$html = '';
		$html = "<div class=\"form-group\">"; 
			$html.= '<label for="'.$this->property['label'].'" class="col-md-2 control-label">'.$this->property['label']."</label>\n";
			if(isset( $this->property['requiredField']) ) $html.=$this->property['requiredField']." ";
			if(isset( $this->property['extraMsg']) ){
				if(isset($this->property['extraMsgEnabled']) )$this->extraMsgHandler();
				//$html.= "<span id=\"".$this->formElement."_extraMsg\" class=\"help-inline small\"> (".$this->extraMsg.")</span> "; 
			}
			$html.="<div class=\"".$cssClass."\">\n";
				$html.= $formElement;
			$html.="</div>";
		$html.="</div>\n";
		$html.="<div class=\"clearfix\"></div>\n";
		return $html;
  }
  
  
  function containerMedia($formElement,$cssClass="",$model,$key ){
		$html = '';
		$html .= "<div class=\"form-group mf0\">";
			$html.= '<label for="'.$this->property['label'].'" class="col-md-2 control-label">'.$this->property['label']."</label>\n";
			if(isset( $this->property['requiredField']) ) $html.=$this->property['requiredField']." ";
			if(isset( $this->property['extraMsg']) ){
				if(isset($this->property['extraMsgEnabled']) )$this->extraMsgHandler();
				//$html.= "<span id=\"".$this->formElement."_extraMsg\" class=\"help-inline small\"> (".$this->extraMsg.")</span> "; 
			}
			$html.="<div class=\" mediaContent ".$cssClass."\">\n";
				$html.= $formElement;
			
				if( $model->$key!='') {
					if( $this->property['mediaType']=='Img') $html.="<div class=\"mt10 mr10 mediaBox\">
							<img class=\"img-responsive imgEditThumb\" src=\"".ma_get_image_from_repository($model->$key)."\">
							".$this->createMediaDeleteBtn( $key,$model->id)."</div>\n";
					else  $html.="<div class=\"mt10 mr10\">
						<div class=\"btn-group\" role=\"group\" aria-label=\"...\">
						  <button type=\"button\" class=\"btn btn-primary\">".$model->$key."</button>
						  ".$this->createMediaDeleteBtn( $key,$model->id)."</div>
						</div>\n";

				}
			$html.="</div>";
		$html.="</div>";
	    $html.= '<hr/>';
		return $html;
  }
  function extraMsgHandler(){
 	 return ( isset($this->property['extraMsg'] )) ? $this->property['extraMsg'] :'';
  }
  
  
  public function getRelation() {
 	 $relationModel = "App\\".$this->property['model'] ;
	 $relationObj   =  $relationModel::all(); //$relationModel;
	 return   $relationObj ;
  } 

  public  function getComboRelation( $obj, $field,$selItem='',$selectedArray='') {
  	
  	 $a = ( isset( $this->property['foreign_key'] ) ) ? $this->property['foreign_key'] : 'id';
	 $b = ( isset( $this->property['label_key']  )  ) ? $this->property['label_key'] : 'name';
	 $nullLabel = ( isset( $this->property['nullLabel']  )  ) ? $this->property['nullLabel'] : 'Select '.$this->property['label'];
	 $multiple = ( isset( $this->property['multiple']  )  ) ? 'multiple' : '';
  	 if( $multiple )$html ="<select class=\"form-control\" id=\"".$field."\" name=\"".$field."[]\" ".$multiple.">\n";
	 else $html ="<select class=\"form-control\" id=\"".$field."\" name=\"".$field."\" >\n";
	 $html .="<option value=\"\">".$nullLabel."</option>";

		
 	 foreach( $obj as $item ) {
 	 	
 	 	$selected = ($item->$a == $selItem || (is_array($selectedArray) && in_array($item->$a,$selectedArray))) ? 'selected':'';
 	 	$html .="<option value=\"".$item->$a."\" ".$selected.">".$item->$b."";
 	    $html .="</option>\n";
 	 } 
	 $html .="</select>\n";
	 return    $html ;
  }

	public  function createMediaDeleteBtn( $key,$id) {
		$html="<a href=\"#\" rel=\"tooltip\" class=\"color-3 ph5\"
				   data-original-title=\"".trans('admin.message.delete_item')."\"
				   onclick=\"deleteImages(this)\" id=\"delete_".$key."_".$id."\"><i class=\"fa fa-trash big\"></i></a>";

		return    $html ;
	}




	/*********************************  LANGUAGE SECTION HELPER ***************************/

	function containerLanguage ( $label,$cssClass="" ){
		$html = '';
		$html = "<div class=\"form-group\">";
		$html.="<h2 class=\"bck-color-2 color-2 pv5 pl15 mf10\">".$label."<h2>\n";
		$html.="</div>\n";
		$html.="<div class=\"clearfix\"></div>\n";
		return $html;
	}



}