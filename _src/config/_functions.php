<?php

// quick functions

function action($num=0) {
	global $_GET,$config;
	$action = $_SERVER['REQUEST_URI'];
	$sub = explode("/",$action,10);
	
	if($config['install_dir']!="") {
		// starting from 2
		$num = $num + 2;	
	} else {
		$num = $num + 1;
	}
	if(isset($sub[$num])) {
		return trim($sub[$num]);
	} else {
		return "";
	}
		
}

// check sub cp  dir exists
function get_main_cp($name) {
	global $config;
	$f = $config['path']."/_src/".$config['script']."/_controllers/".$name;
	if(file_exists($f)) {
		return $f;
	} else {
		return false;
	}
}

// check cp exists
function get_controller($name) {
	global $config,$cp;
	if($cp->sub=="") {
		$f = $config['path']."/_src/".$config['script']."/_controllers/".$name.".php";
	} else {
		$f = $config['path']."/_src/".$config['script']."/_controllers/".$cp->sub."/".$name.".php";
	}
	if(file_exists($f)) {
		return $f;
	} else {
		return false;
	}
}
function _POST($name) {
	global $_POST;
	if(isset($_POST[$name])) {
		return $_POST[$name];
	} else {
		debug("_POST ERROR: ".$name." <-- "," NO VALUE");
		exit;
	}
}

function _GET($name) {
	global $_GET;
	if(isset($_GET[$name])) {
		return $_GET[$name];
	} else {
		debug("_GET ERROR: ".$name." <-- "," NO VALUE");
		exit;
	}
}

// check language exists
function get_language($name,$action="global") {
	global $config,$cp;
	if($cp->sub=="") {
		$f = $config['path']."/languages/".$config['script']."/".$name."/".$action.".php";
	} else {
		$f = $config['path']."/languages/".$config['script']."/".$name."/".$cp->sub."/".$action.".php";
	}
	if(file_exists($f)) {
		return $f;
	} else {
		return false;
	}	
}

// check template exists
function get_template($name) {
	global $config,$cp;
	
	if($cp->sub=="") {
		$f = $config['path']."/_src/".$config['script']."/_templates/".$name.".php";
	} else {
		$f = $config['path']."/_src/".$config['script']."/_templates/".$cp->sub."/".$name.".php";
	}
	if(file_exists($f)) {
		return $f;
	} else {
		return false;
	}	
}

// return class name
function ini_cp($name) {
	global $cp;
	if($cp->sub=="") {
		return "C".$name;
	} else {
		return "C".$cp->sub."_".$name;
	}
}

// return template name
function ini_temp($name) {
	global $cp;
	if($cp->sub=="") {
		return "T".$name;
	} else {
		return "T".$cp->sub."_".$name;
	}
}

function required_pages_js($type = "themes", $re = false) {
	global $cp,$config,$class;
	$name = $class->name;
	$html = "\n\n\n";
	if($type == "tmp") {
		if($cp->sub=="") {
				$global = $config['path']."/_src/".$config['script']."/_templates/_html/".$config['themes']."/global.javascripts.php";	
				$global_file = _URL_.'/js./tmp/global.js'; 
		} else {
				$global = $config['path']."/_src/".$config['script']."/_templates/_html/".$config['themes']."/".$cp->sub."/global.javascripts.php";	 
				$global_file = _URL_.'/js./tmp/'.$cp->sub.'/global.js';
		}
		if($name!="") {	
			if($cp->sub=="") {
				$f = $config['path']."/_src/".$config['script']."/_templates/_html/".$config['themes']."/".$name.".javascripts.php";
				$f_file = _URL_.'/js./tmp/'.$name.'.js';
			} else {
				$f = $config['path']."/_src/".$config['script']."/_templates/_html/".$config['themes']."/".$cp->sub."/".$name.".javascripts.php";			
				$f_file = _URL_.'/js./tmp/'.$cp->sub.'/'.$name.'.js';
			}	
		}
	
			
	} else {
	
		if($cp->sub=="") {
				$global = $config['path']."/themes/".$config['script']."/".$config['themes']."/global.javascripts.php";	
				$global_file = _URL_.'/js./themes/global.js'; 
		} else {
				$global = $config['path']."/themes/".$config['script']."/".$config['themes']."/".$cp->sub."/global.javascripts.php";	 
				$global_file = _URL_.'/js./themes/'.$cp->sub.'/global.js';
		}
		if($name!="") {	
			if($cp->sub=="") {
				$f = $config['path']."/themes/".$config['script']."/".$config['themes']."/".$name.".javascripts.php";
				$f_file = _URL_.'/js./themes/'.$name.'.js';
			} else {
				$f = $config['path']."/themes/".$config['script']."/".$config['themes']."/".$cp->sub."/".$name.".javascripts.php";			
				$f_file = _URL_.'/js./themes/'.$cp->sub.'/'.$name.'.js';
			}	
		}
					
	}
	
	if(file_exists($global)) {
		$html .= "\n".'<script language="javascript" src="'.$global_file.'" ></script>';
	} 	
	if(file_exists($f)) {
		$html .= "\n".'<script language="javascript" src="'.$f_file.'" ></script>';
	} 	
	
	if($re == false ) {
		echo $html;
	} else {
		return $html;
	}
			

}

function required_js($ex = array(), $re = false) {	
global $cp,$output;
	$html = '';
	
	if(count($ex)>=1) {
		foreach($ex as $name=>$desc) {
			if($name!="") {			
					$html .= "\n".'<!---'.$desc.' ---> <script language="javascript" src="'._URL_.'/themes/global/js/'.$name.'.js" ></script>';			
			}
		}
	}
	if($re == true) {
		return $html;
	} else {
		echo $html;
	}
}

function required_css($ex = array(), $media = array(), $re = false) {
	$html = '';
	if(count($ex)>=1) {
		foreach($ex as $name=>$desc) {
			if($name!="") {	
					if(isset($media[$name])) {
						$m = 'media="'.$media[$name].'"';
					} else {
						$m = '';
					}
					
					$html .=  "\n".'<!---'.$desc.' ---> <link type="text/css" rel="stylesheet" href="'._URL_.'/themes/global/css/'.$name.'.css" '.$m.'>';			
			}
		}
	}
	if($re == true) {
		return $html;
	} else {
		echo $html;
	}
}


// return path of files by URL in theme
function themes($file="") {
	global $config;
	$f = $config['url']."/themes/".$config['script']."/".$config['themes']."/".$file;
	return $f;
}

// safe quotes use for SQL
function safe_quotes($text) {
	global $config;
	$bk = $text;
	$text =  htmlspecialchars($text,ENT_QUOTES, $config['htmlentities']);
	if(trim($text) == "") {
	//	debug("FOUND IT");
		$text  = preg_replace("/[^\d\s\r\n\t\+\=\<\>\$\%\(\)\.\,\?a-zA-Z\-\+]+/","",$bk);
	//	debug("Fixed to:",$text);
	}
	
	return $text;	
}

function un_quotes($text) {
	global $config;
	if(is_string($text)) {
		$text = htmlspecialchars_decode($text,ENT_QUOTES);
	}
	return $text;
}


// change location by URL
function change_location($new,$script=true) {
	global $config;
	$f = $config['url']."/".$new;
	if($script==true) {
		die('<html><head><meta http-equiv="refresh" content="1;url='.$f.'"></head><body>Redirecting ....</body></html>');
	} else {
		header("location: ".$f);
	}
}

// change location by action
function change_action($action,$script=true) {
	global $config,$cp;
	if($cp->sub!="") {
		$f = $config['url']."/".$cp->sub."/".$action;
	} else {
		$f = $config['url']."/".$action;
	}
	if($script==true) {
		die('<html><head><meta http-equiv="refresh" content="1;url='.$f.'"></head><body>Redirecting ....</body></html>');
	} else {
		header("location: ".$f);
	}	
}

function debug($error,$log="") {
	global $config;
	/*
	echo $error;
	/// do something with log
	die($log);
	*/
	if(!isset($_SERVER['HTTP_REFERER'])) {
		$_SERVER['HTTP_REFERER'] = "NO REFERER";
	}
	$file = $config['path']."/_src/log.txt";
	$f=fopen($file,"a");
	fwrite($f,@date("d-m-Y H:i:s")." --> ". $error." :: ".$log."\n".
			":: IP: ".$_SERVER['REMOTE_ADDR']." :: REFEFER: ".$_SERVER['HTTP_REFERER']."\n".
			":: AGENT: ".$_SERVER['HTTP_USER_AGENT']." \n".
			":: PHP_SELF: ".$_SERVER['PHP_SELF']."  \n".
			":: URI: ".$_SERVER['REQUEST_URI']." \n".
			":: QUERY STRING ".$_SERVER['QUERY_STRING']."\n\n");	
	fclose($f);
	
}

function debug_json($value) {
	$json['result'] = 'error';
	$json['text'] = "V: ".$value;
	$json['title'] = "Debugging";
	echo create_json($json);
	exit;
}

function create_json($array) {
	return json_encode($array);
}

function ini_seo($text) {	
	global $config;
	
	if($config['seo'] == "ascii") {	
		$text = c_to_ascci(latin_to_ascii(utf8_to_ascii($text)));
		$text = preg_replace("/[^a-zA-Z0-9\-]/","-", $text);
		$text = strtolower($text);
	}
	
	$text = trim($text);	
	$text = str_replace(' ','-',$text);
	$text = preg_replace("/\-[\-]+/","-",$text);	
	if(function_exists("mb_strtolower")) {
			$text = mb_strtolower($text, mb_internal_encoding());
	}
	
	return $text;
	
}


function utf8_to_ascii($str) {
	$chars = array(
		'a'	=>	array('ấ','ầ','ẩ','ẫ','ậ','Ấ','Ầ','Ẩ','Ẫ','Ậ','ắ','ằ','ẳ','ẵ','ặ','Ắ','Ằ','Ẳ','Ẵ','Ặ','á','à','ả','ã','ạ','â','ă','Á','À','Ả','Ã','Ạ','Â','Ă'),
		'e' =>	array('ế','ề','ể','ễ','ệ','Ế','Ề','Ể','Ễ','Ệ','é','è','ẻ','ẽ','ẹ','ê','É','È','Ẻ','Ẽ','Ẹ','Ê'),
		'i'	=>	array('í','ì','ỉ','ĩ','ị','Í','Ì','Ỉ','Ĩ','Ị'),
		'o'	=>	array('ố','ồ','ổ','ỗ','ộ','Ố','Ồ','Ổ','Ô','Ộ','ớ','ờ','ở','ỡ','ợ','Ớ','Ờ','Ở','Ỡ','Ợ','ó','ò','ỏ','õ','ọ','ô','ơ','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ơ'),
		'u'	=>	array('ứ','ừ','ử','ữ','ự','Ứ','Ừ','Ử','Ữ','Ự','ú','ù','ủ','ũ','ụ','ư','Ú','Ù','Ủ','Ũ','Ụ','Ư'),
		'y'	=>	array('ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
		'd'	=>	array('đ','Đ'),
	);
	foreach ($chars as $key => $arr) 
		foreach ($arr as $val)
			$str = str_replace($val,$key,$str);
	return $str;
}

function latin_to_ascii($str) {
	$chars = array(
		 'a'	=>	array('&#7845;','&#7847;','&#7849;','&#7851;','&#7853;','&#7844;','&#7846;','&#7848;','&#7850;','&#7852;','&#7855;','&#7857;','&#7859;','&#7861;','&#7863;','&#7854;','&#7856;','&#7858;','&#7860;','&#7862;','&aacute;','&agrave;','&#7843;','&atilde;','&#7841;','&acirc;','&#259;','&Aacute;','&Agrave;','&#7842;','&Atilde;','&#7840;','&Acirc;','&#258;'),
		 'e' =>	array('&#7871;','&#7873;','&#7875;','&#7877;','&#7879;','&#7870;','&#7872;','&#7874;','&#7876;','&#7878;','&eacute;','&egrave;','&#7867;','&#7869;','&#7865;','&ecirc;','&Eacute;','&Egrave;','&#7866;','&#7868;','&#7864;','&Ecirc;'),
		 'i'	=>	array('&iacute;','&igrave;','&#7881;','&#297;','&#7883;','&Iacute;','&Igrave;','&#7880;','&#296;','&#7882;'),
		 'o'	=>	array('&#7889;','&#7891;','&#7893;','&#7895;','&#7897;','&#7888;','&#7890;','&#7892;','&Ocirc;','&#7896;','&#7899;','&#7901;','&#7903;','&#7905;','&#7907;','&#7898;','&#7900;','&#7902;','&#7904;','&#7906;','&oacute;','&ograve;','&#7887;','&otilde;','&#7885;','&ocirc;','&#417;','&Oacute;','&Ograve;','&#7886;','&Otilde;','&#7884;','&Ocirc;','&#416;'),
		 'u'	=>	array('&#7913;','&#7915;','&#7917;','&#7919;','&#7921;','&#7912;','&#7914;','&#7916;','&#7918;','&#7920;','&uacute;','&ugrave;','&#7911;','&#361;','&#7909;','&#432;','&Uacute;','&Ugrave;','&#7910;','&#360;','&#7908;','&#431;'),
		 'y'	=>	array('&yacute;','&#7923;','&#7927;','&#7929;','&#7925;','&Yacute;','&#7922;','&#7926;','&#7928;','&#7924;'),
		 'd'	=>	array('&#273;','&#272;'),		
	);
	foreach ($chars as $key => $arr) 
		foreach ($arr as $val)
			$str = str_replace($val,$key,$str);
	return $str;
}

function c_to_ascci($str) {
	$chars = array(
		 'a'	=>	array('г†','ã¡','ã','¡','°'),
		 'e' 	=>	array('ãª'),
		 'i'	=>	array('ã','ã¬'),
		 'o'	=>	array('æ¡'),
		 'u'	=>	array('æ°'),
		 'y'	=>	array('&yacute;'),
		 'd'	=>	array('дС','�',''),
	);
	foreach ($chars as $key => $arr) 
		foreach ($arr as $val)
			$str = str_replace($val,$key,$str);
	return $str;
}


function xlang($text) {
	global $lang;
	$text=str_replace(' ','_',$text);
	if(isset($lang[$text])) {
		return $lang[$text];
	} else {
		return "".str_replace("_"," ",$text)."";
	}
}

function add_level($level,$char='--',$icon = ' ') {
	$text = str_repeat($char,$level);	
	if($level>0) {
		$text.=$icon;
	}
	return $text;
}

function global_img($name, $data="" ) {
	global $config;
	$img = "<img src='"._URL_."/themes/global/img/".$name."' border=0 ".$data." >";
	return $img;
}

function required_modules($name) {
	global $config,$db,$helper,$_GET,$_POST;
	$f1 = $config['path']."/_src/".$config['script']."/_modules/".$name.".php";
	$f2 = $config['path']."/_modules/".$name.".php";
	if(file_exists($f1)) {
		require_once($f1);
	}elseif(file_exists($f2)) {
		require_once($f2);
	}	
}


function run_plugins($name,$action="index",$mute=false,$var="") {
	global $config,$db,$helper,$_GET,$_POST;
	$f1 = $config['path']."/_src/".$config['script']."/_plugins/".$name.".php";
	$f2 = $config['path']."/_plugins/".$name.".php";
	if(file_exists($f1)) {
		require_once($f1);
	}elseif(file_exists($f2)) {
		require_once($f2);
	}	
	
	$plug = "PLUGINS_".$name."();";
	eval('$plug	= new '.$plug);
	$plug->mute = $mute;
	eval('$plug->'.$action.'('.$var.');');
}


function ini_capcha() {
	global $_SESSION;
	if(!isset($_SESSION['capcha']['num1'])) {
		create_new_capcha();		
	}
}

function create_new_capcha() {	
	$num1=rand(1,10);
	$num2=rand(1,10);
	$num3=rand(1,10);
	$_SESSION['capcha']['num1']=$num1;
	$_SESSION['capcha']['num2']=$num2;
	$_SESSION['capcha']['num3']=$num3;	
	$_SESSION['capcha']['total'] = $num1 + $num2 + $num3;		
}

function read_capcha() {
	return $_SESSION['capcha']['total'];
}

function show_capcha() {
	header ('Content-Type: image/png');
	$im = imagecreatetruecolor(100,24);
	$white = imagecolorallocate($im, 255, 255, 255);
	$grey = imagecolorallocate($im, 128, 128, 128);
	$black = imagecolorallocate($im, 0, 0, 0);	
	$text_color = $black;
	imagefilledrectangle($im, 0, 0, 399, 29, $white);	
	imagestring($im, 2, 5, 5,  $_SESSION['capcha']['num1']. ' + '. $_SESSION['capcha']['num2']. ' + ' .$_SESSION['capcha']['num3']. ' = ??' , $text_color);
	imagepng($im);
	imagedestroy($im);	
	exit;
	
}

?>