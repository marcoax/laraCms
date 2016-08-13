<?php
namespace App\laraCms\Tools;
class Stringable {

    public static function camelize( $string )
    {
        return preg_replace_callback(
            '/_\D/',
            create_function( '$match', 'return strtoupper( substr( $match[ 0 ], 1 ) );' ),
            $string
        );
    }

    public static function hyphenate( $string )
    {
        return preg_replace_callback(
            '/[A-Z]/',
            create_function( '$match', 'return "_" . strtolower( $match[ 0 ] );' ),
            strtolower( substr( $string, 0, 1 ) ) . substr( $string, 1 )
        );
    }
    
    public static function truncate( $string, $stringWidth = 10, $separator = '…' )
    {
        $parts       = preg_split( '/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE );
        $parts_count = count( $parts );
        $length      = 0;
        $last_part   = 0;

        for( ; $last_part < $parts_count; ++$last_part )
        {
            $length += strlen( $parts[ $last_part ] );

            if ( $length > $stringWidth )
            {
                break;
            }
        }

        return implode( array_slice( $parts, 0, $last_part ) ) . $separator;
    }
    
    public static function slugify( $value )
    {
        $value = preg_replace( '~[^\\pL\d]+~u', '-', $value );
        $value = trim( $value, '-' );
        $value = iconv( 'utf-8', 'us-ascii//TRANSLIT', $value );
        $value = strtolower( $value );
        $value = preg_replace( '~[^-\w]+~', '', $value );

        return $value;
    }

    public static function highlightKeywordsInString( $string, $keyword, $tag = 'span' )
    {
        if( !$keyword )
            return $string;
        
        $string = preg_replace( '/\w*?' . preg_quote( $keyword ) . '\w*/i', '<' . $tag . ' class="highlight">$0</' . $tag . '>', $string );

        return $string;
    }
    
    
    public static function format_size($size) {
        $units = explode(' ','B KB MB GB TB PB');
        $mod = 1024;

        for ($i = 0; $size > $mod; $i++) {
            $size /= $mod;
        }

        $endIndex = strpos($size, ".")+3;

        return substr( $size, 0, $endIndex).' '.$units[$i];
    }
    
    
    public static function arrayToString($arrayData) {
       return implode(",", preg_replace('/^(.*?)$/', "'$1'", $arrayData));
    }
    
    
    
    
    public static function generateRefCode($pre,$str,$filler=0,$digit=6) {
       return  $pre.str_pad($str,$digit,$filler,STR_PAD_LEFT);;
    }
    
    
   public static function sanitizeString($string,$trimspace=true){
            $string = utf8_encode(addslashes($string));
            if($trimspace==true)$string = str_replace(array( "\n", "\t", "\r"), '', $string );
            return $string;
   }

   public static function sanitizeImportString($string,$trimspace=false){
            $string = utf8_decode(addslashes($string));
            if($trimspace==true)$string = str_replace(array( "\n", "\t", "\r"), '', $string );
            return $string;
   }
   
   
   
   public static function sanitizeExportString($string,$decode=false){
            $string = stripslashes($string);
			if( $decode == true) $string = utf8_decode($string);
           
            return $string;
   }
   
   
  public static function sanitizeFileName($filename){
    
        $file_ext            = pathinfo( $filename, PATHINFO_EXTENSION );
        $file_dst_name_body  = pathinfo( $filename, PATHINFO_FILENAME );
           
        $file_dst_name_body  = str_replace(array(' ', '-'), array('_','_'), $file_dst_name_body) ;
        $file_dst_name_body  = preg_replace('/[^A-Za-z0-9_]/', '', $file_dst_name_body) ;
        
        $filenameSanitize    = $file_dst_name_body.'.'.$file_ext;
            
        return $filenameSanitize;
   }
   


    public static function startsWith($haystack, $needle)
    {
      
          return substr($haystack, 0, strlen($needle)) === $needle;
    }
    
    public static function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }
    
        return (substr($haystack, -$length) === $needle);
    }
    
	
	/**
     * Verifico se un   valore è veramente nullo
     *
     * 
     *
     * @param string $value da stampare
     * 
     * 
     * @return $boolen
    */ 
    public static  function ma_not_null($value) {
        if (is_array($value)) {
            if (sizeof($value) > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            if (($value != '') && (strtolower($value) != 'null') && (strlen(trim($value)) > 0)) {
    
                return true;
            } else {
                return false;
            }
        }
    }
	
	public static  function  is_True ($value)
    // test if a value is TRUE or FALSE
    {
        if (is_bool($value)) return $value;

        // a string field may contain several possible values
        if (preg_match('/^(Y|YES|T|TRUE|ON|1)$/i', $value)) {
            return true;
        } // if

        return false;

    } // is_True
	
	/**
     * Verifico limita i caratteri di una stringa
     *
     * 
     *
     * @param string $value da limare
     * 
     * 
     * @return $string
    */
	public static function string_limiter($string,$max_char,$appString='',$showappString=1){
			$string=strip_tags($string);
			$stringL=mb_strlen($string); 
			$string=substr($string,0,$max_char);
	 		if($showappString==0) {
	   			if($stringL>$max_char)$string.=$appString;
	 		}
			 else if($appString)$string.=$appString;
	 		return $string;
	  }
	 
	 /**
     * Verifico limita i caratteri di una stringa
     *
     * 
     *
     * @param string $stringa da concatenare 
     * 
     * 
     * @return $string
     */
	 public static function ma_string_concat($stringa='',$stringb='',$sep=''){
	      if($stringa)$string=$stringa.$sep.$stringb;
	      else $string.=$stringb;
	     return $string;
	  }
    /**************************   FOR  HTML  HELP  ********************************/
    /**
     * Add br at the end of a string
     *
     * 
     *
     * @param string $value 
     * 
     * 
     * @return $value
     */
    function ma_add_br($value){
    	return $value."<br/>";
	}
    
    /**************************  GESTIONE   SIMPLE DEBUGGER   *********************/
    
    
    public static function debugStringFormatter($string,$all=false) {
            
      $string="<pre>".$string."</pre>";
     
      echo  $string;
    }

    public static function debugArrayFormatter($arrayData,$all=false) {

        if(is_array($arrayData)){
            while (list($var, $val) = each($arrayData)) {
                if($_SERVER['REMOTE_ADDR']=='80.91.51.18' or $all==true) echo "<pre>$var is $val</pre>\n";
            }
        }

    }
    
    
   
    
    /**
	* Display a var dump in firebug console
	*
	* @param object $object Object to display
	*/
	public static function fd($object, $type = 'log')
	{
		$types = array('log', 'debug', 'info', 'warn', 'error', 'assert');
		
		if(!in_array($type, $types))
			$type = 'log';
		
		echo '
			<script type="text/javascript">
				console.'.$type.'('.json_encode($object).');
			</script>
		';
	}
    
    
}