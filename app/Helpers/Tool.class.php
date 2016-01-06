<?php namespace App\Helpers;
class Tool {

    
	
	//********************* FILES  ********************************************/
	public  static function ckRemoteFileExist( $fileUrl ) {
		
		$file = 'http://www.domain.com/somefile.jpg';
		$file_headers = @get_headers($fileUrl);
		if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
		    $exists = false;
		}
		else {
		    $exists = true;
		}
	}
	
	
	public  static function getRemoteFileData( $fileUrl,$parameter ='' ) {
		$head = array_change_key_case(get_headers($fileUrl, TRUE));
		//$filesize = $head['content-length'];
		if( $parameter !='') return $head[$parameter];
		return $head;
	}  
	
	  
	//********************* PASSWORD AND TOKEN ********************************************/
	
	/**
	* Random password generator
	*
	* @param integer $length Desired length (optional)
	* @param string $flag Output type (NUMERIC, ALPHANUMERIC, NO_NUMERIC)
	* @return string Password
	*/
	public static function passwdGen($length = 8, $flag = 'ALPHANUMERIC')
	{
		switch ($flag)
		{
			case 'NUMERIC':
				$str = '0123456789';
				break;
			case 'NO_NUMERIC':
				$str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
				break;
			default:
				$str = 'abcdefghijkmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
				break;
		}

		for ($i = 0, $passwd = ''; $i < $length; $i++)
			$passwd .= substr($str, mt_rand(0, Tools::strlen($str) - 1), 1);
		return $passwd;
	}
	public  static function encPwd($password){
	    	return $pwd = md5($password);
	}
	
	public static function generateToken() {
       return md5(uniqid(rand(), true));
    }
	
	/******************************** SEO E GESTIONE PAGINE URL ********************/
	
	
	/**
	* url della  pagina ma_curPageURL
	*
	* 
	* @return string $pageURL
	*/
	function ma_curPageURL() {
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} 
		else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
 
	/**
	* url della  pagina ma_curPageURL
	* @param  string $urlString
	* @return string $urlString
	*/
	function ma_get_full_url($urlString) {
		return DIR_WS_CATALOG.$urlString;
	}
	
	/**
	* return to the previus  page
	* @param  string $altUrl (OPTIONAL)
	* @return string $altUrl
	*/
	
	function ma_go_back( $altUrl ='' ){
	
		if(isset($_SERVER['HTTP_REFERER'])) {
			return  $_SERVER['HTTP_REFERER'];
		}
		else if(String::ma_not_null($altUrl)) return $altUrl;
	
	}

    /**
	* return check   URL is  in the  current domain
	* @param  string $url   
	* @param  string $target (OPTIONAL - DEFAULT = new )
	* @return string
	*/
	function ma_url_target($url, $target='_new'){
	
		$curHost = parse_url(HTTP_SERVER);
		$linkHost= parse_url($url);
		if($curHost['host']== $linkHost['host']) return '';
		else return " target=\"".$target."\" ";
	
	}
	 /**
	* return check   URL is a  vaild  url
	* @param  string $str  
	* 
	* @return string  $str
	*/
	function ma_prep_url( $str = ''){
		if ($str == 'http://' OR $str == '')
		{
			return '';
		}
		
		if (substr($str, 0, 7) != 'http://' && substr($str, 0, 8) != 'https://')
		{
			$str = 'http://'.$str;
		}
		
		return $str;
	}
	
	public static function seoPathHandler( $data ,$sep ='-') {
		
		global $lang;
		$pathString ;
	    $curItemidentifier;
		$pathString = $lang.'/';
		if( $data->pageCode!= 'home' ) $curItemidentifier = $data->a.$sep.String::slugify( $data->Name );
		if( $curItemidentifier ) $pathString .= $curItemidentifier;
		
	
		$pathString = Tool::ma_get_full_url($pathString);
		return $pathString;
	}
	
	
	public static function cmsPreviewHandler( $data,$lang='it',$sep ='-' ){
	
		 $pathString ;
	     $curItemidentifier;
		 $pathString = $lang.'/';
		 if( $data->pageCode!= 'home' ) $curItemidentifier = $data->a.$sep.String::slugify( $data->Name );
		 if( $curItemidentifier ) $pathString .= $curItemidentifier;
		
		 if(GOOGLE_ENABLE_TRANSLATE==1)$pathString.='?translate=1';
		 //$pathString=ma_get_full_url($pathString);
		 return DIR_WS_CATALOG.$pathString;
	}
	
	/********************************  LANG  HANDLER  ********************/
	
	function ma_lang_handler( $data,$lang,$sep=' | ',$useDiv=0){
		if($data){
		    $nLingue= count($data );
		    $i = 1;
		    foreach($data as $d){
	        $pageActive='';
	        
	        if($i>1 && $useDiv==1) $menuLang.="</li><li class=\"divider\"></li>\n";
			if($lang == $d->a){
	            $pageActive='class="active"';
				$menuLang.="<li ".$pageActive.">";
				$menuLang.="<a >".$d->b." <i class=\"fa fa-check\"></i></a>";
				
	        }
			else {
				$menuLang.="<li>";
				$menuLang.="<a href=\"".Tool::stripLang($d->a)."\" >".$d->b."</a>";
			}
	        if($nLingue>$i && $useDiv!=1)$menuLang.=$sep;
	        $menuLang.="</li>\n";
	            $i++;
	        }
			
	    }
	    return $menuLang;
	}
	
	public static function stripLang($newLang){ 
	    // if url contains lang para
		global $lang;
		$Url    = $_SERVER['PHP_SELF'];
		$Query  = $_SERVER['QUERY_STRING'];
		$Uri    = $_SERVER['REQUEST_URI'];
		$Host   = $_SERVER['SERVER_NAME'];
		$curUrl = $Uri;
		//if($Query)$curUrl=$Uri.'?'.$Query;
		if($_GET['lang']) {
			$addr = str_replace('lang='.$lang,'lang='.$newLang,$curUrl);
		}
		else if(!preg_match('/'.$lang.'/',$curUrl)) {
			$addr = $curUrl.'/'.$newLang.'/';
		}
		else {
			
			$addr=str_replace('/'.$lang.'/','/'.$newLang.'/',$curUrl);
		}
		return str_replace( '//','/' , $addr );
	}

    /**
	* return init  the  website language
	* @param  string $defaultLang   
	* 
	* @return string $lang
	*/
	public static function comefrom( $defaultLang) {
		$lang = $_SERVER['HTTP_ACCEPT_LANGUAGE']; 
		if (substr($lang, 0, 2) == 'en'){
			$lang='en';
		} 
		else if (substr($lang, 0, 2) == 'it'){
			$lang='it';
		}
		else $lang=$defaultLang;
	  /*
          else if (substr($lang, 0, 2) == 'fr'){
		      $lang='fr';
		   }
		   else if (substr($lang, 0, 2) == 'es'){
		      $lang='es';
		   }
		   else if (substr($lang, 0, 2) == 'ru'){
		      $lang='ru';
		   }
		   else if (substr($lang, 0, 2) == 'zh'){
		      $lang='zh';
		   }
		   else if (substr($lang, 0, 2) == 'pt'){
		      $lang='pt';
		   }
		*/
		return $lang; 
	}
	
	 /**
	* return the bowser lang
	*  
	* 
	* @return string 
	*/
	function browserLang()
	{
		if (preg_match('/zh-tw/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
			return "zh-TW";
		} else {
			return substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		}
	}
	
	 /**
	* return the current seesion lang	*  
	* 
	* @return lang 
	*/
	function ma_get_lang(){
		if(!ma_not_null($_SESSION['langSite']) ){
			$lang=Tool::comefrom(LANG_PRE);
			$_SESSION['langSite']=$lang;
		}
		$lang=(ma_not_null($_REQUEST['lang']))?$_REQUEST['lang']:$_SESSION['langSite'];
		return $lang;
	}
}	