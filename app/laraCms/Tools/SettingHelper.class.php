<?php namespace App\laraCms\Tools;

 use App\Setting;
/**
 * Class Setting
 * @package App\laraCms\Tools
 */
class SettingHelper {

	/**
	 * @param $key
	 * @return mixed
     */
	static public function getOption($key)
	{

		$settingObj = Setting::whereKey($key)->first();
		return $settingObj->value;
	}

}	