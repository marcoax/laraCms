<?php namespace App\LaraCms\Tools;

use App\Setting;
/**
* Class Setting
* @package App\LaraCms\Tools
*/
class HtmlHelper {

	/**
	* @param $icons
	* @param $classes
	* @param $forceicon
	* @param $echo
	* @return mixed
	*/
	static public function createFAIcon($icons, $classes = '', $forceicon = false, $echo = true) {
		$arr_icons = explode(',', $icons);

		$str_classes = implode(' ',explode(',', $classes));

		if ((count($arr_icons) == 1) || ($forceicon !== false)) {
			$sel_icon = ($forceicon === false)? 0: $forceicon;
			//simple icon
			$output = '<i class="fa fa-'.$arr_icons[$sel_icon].' '.$str_classes.'"></i>';
		}
		else {
			//stacked icon
			$output = '';
			$output .= '<span class="fa-stack '.$str_classes.'">';
			$output .= '<i class="fa fa-'.$arr_icons[0].' fa-stack-2x"></i>';
			$output .= '<i class="fa fa-'.$arr_icons[1].' fa-stack-1x fa-inverse"></i>';
			$output .= '</span>';
		}

		if ($echo) echo $output; else return $output;
	}

	static public function checkError($errors, $field) {
		if ($errors->has($field)) {
			return 'input-danger';
		}
	}

	static public function videoEmbed($id, $ratio = '16by9') {
		$output = '';
		$output .= '<div class="embed-responsive embed-responsive-'.$ratio.'">';
		$output .= '<iframe class="embed-responsive-item" src="'.$id.'"></iframe>';
		$output .= '</div>';
		return $output;
	}
}
