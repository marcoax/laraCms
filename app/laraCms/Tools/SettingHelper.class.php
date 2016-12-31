<?php namespace App\LaraCms\Tools;

 use App\Setting;
/**
 * Class Setting
 * @package App\LaraCms\Tools
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