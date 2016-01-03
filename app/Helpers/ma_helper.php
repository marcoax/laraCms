<?php

    /********      image    *****************/
	function ma_get_image_from_repository($img){
		
		$path  = config('admin.path.img_repository');
		return asset($path.$img); 
	}
	function ma_get_image_from_media_repository($img){

		$path  = config('admin.path.media_img_repository');
		return asset($path.$img);
	}
	/********      image    *****************/
	function ma_get_image_on_the_fly($img,$w,$h,$type='jpg'){


		$img = Image::make(ma_get_image_from_repository($img) )->fit($w,$h)->encode($type);
		return  'data:image/' . $type . ';base64,' . base64_encode($img);
	}
	/********      image    *****************/
	function ma_get_image_on_the_fly_chached($asset,$w,$h,$type='jpg'){
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
	 /*********************  doc **********************/
	function ma_get_doc_from_repository($doc){
		$path  = config('admin.path.doc_repository');
		return asset($path.$doc);
	}
		function ma_get_doc_from_media_repository($doc){

			$path  = config('admin.path.media_doc_repository');
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
	
	