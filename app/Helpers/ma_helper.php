<?php
	/*********************  doc **********************/
	function ma_get_doc_from_repository($doc){
		$path  = config('admin.path.doc_repository');
		return asset($path.$doc);
	}

    /********      image    *****************/
	function ma_get_image_from_repository($img){
		
		$path  =config('admin.path.img_repository');
		return asset($path.$img); 
	}

	/********      image    *****************/
	function ma_get_image_on_the_fly($asset,$w,$h,$type='jpg'){

		if($asset!='') {
			$img = Image::make(ma_get_image_from_repository($asset) )->fit($w,$h)->encode($type);
			return  'data:image/' . $type . ';base64,' . base64_encode($img);
		}
		else return null;
	}
	/********      image    *****************/
	function ma_get_image_on_the_fly_chached($asset,$w,$h,$type='jpg'){
		if($asset!='') {
			$dataImage = array();
			$dataImage['asset'] = $asset;
			$dataImage['w'] = $w;
			$dataImage['h'] = $h;
			$dataImage['type'] = $type;
			$img = Image::cache(function($image) use ($dataImage) {
				$image->make(ma_get_image_from_repository($dataImage['asset']))->fit($dataImage['w'],$dataImage['h'])->encode($dataImage['type']);
			});
			return  'data:image/' . $type . ';base64,' . base64_encode($img);
		}
		else return null;
	}

	
	/*******************  admin   ***************/
	function ma_get_admin_list_url( $model ){
		$path      = '/admin/list';
		$modelName = (!is_object( $model )) ? strtolower( $model ) : strtolower(str_plural( class_basename($model) ));
		return URL::to($path.'/'.str_plural($modelName)); 
	}

	function ma_get_admin_create_url( $model ){
		$path      = '/admin/create';
		$modelName = (!is_object( $model )) ? strtolower( $model ) : strtolower(str_plural( class_basename($model) ));
		return URL::to($path.'/'.str_plural($modelName));
	}
	function ma_get_admin_edit_url( $model ){
		$path      = '/admin/edit';
		$modelName = (!is_object( $model )) ? strtolower( $model ) : strtolower(str_plural( class_basename($model) ));
		return URL::to($path.'/'.str_plural($modelName).'/'.$model->id);
	}
	function ma_get_admin_delete_url( $model ){
		$path      = '/admin/delete';
		$modelName = (!is_object( $model )) ? strtolower( $model ) : strtolower(str_plural( class_basename($model) ));
		return URL::to($path.'/'.str_plural($modelName).'/'.$model->id);
	}

	/**
	 * Is the mime type an image
	 */
	function is_image($mimeType)
	{
		return starts_with($mimeType, 'image/');
	}
	
	