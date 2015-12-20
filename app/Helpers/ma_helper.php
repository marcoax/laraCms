<?php

    /********      image    *****************/
	function ma_get_image_from_repository($img){
		
		$path  = config('admin.path.img_repository');
		return asset($path.$img); 
	}
	 /*********************  doc **********************/
	function ma_get_doc_from_repository($doc){
		$path  = config('admin.path.doc_repository');
		return asset($path.$doc);
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
	
	