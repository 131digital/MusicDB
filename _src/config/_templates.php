<?php

class templates {
	var $html="";
	var $tmp = array();
	
	public function output() {
		
	}
	
	public function ftemp($name,$data = array()) {
		global $cp,$config,$_GET,$_POST,$_FILES,$_SERVER,$db,$helper,$class;
		if($cp->sub=="") {
			$f = $config['path']."/_src/".$config['script']."/_templates/_html/".$config['themes']."/".$name.".php";
		} else {
			$f = $config['path']."/_src/".$config['script']."/_templates/_html/".$config['themes']."/".$cp->sub."/".$name.".php";
		}
		if(file_exists($f)) {
			require($f);
		} else {
			debug("FILE NOT FOUND",$f);
		}
		
	}
	
	public function ftheme($name,$data = array()) {
		global $cp,$config,$_GET,$_POST,$_FILES,$_SERVER,$db,$helper,$class;
		if($cp->sub=="") {
			$f = $config['path']."/themes/".$config['script']."/".$config['themes']."/".$name.".php";
		} else {
			$f = $config['path']."/themes/".$config['script']."/".$config['themes']."/".$cp->sub."/".$name.".php";
		}
		if(file_exists($f)) {
			require($f);
		} else {
			debug("FILE NOT FOUND",$f);
		}
	}
	
	public function rtheme($name) {
		global $cp,$config,$_GET,$_POST,$_FILES,$_SERVER,$db,$helper,$class;
		if($cp->sub=="") {
			$f = $config['path']."/themes/".$config['script']."/".$config['themes']."/".$name.".php";
		} else {
			$f = $config['path']."/themes/".$config['script']."/".$config['themes']."/".$cp->sub."/".$name.".php";
		}
		if(file_exists($f)) {
			$html = file_get_contents($f);
			if(strpos($html,'{THEME}') > 0 ) {
				$html = str_replace("{THEME}",_URL_."/themes/".$config['script']."/".$config['themes'],$html);
			}
			return $html;
			
		} else {
			debug("FILE NOT FOUND",$f);
		}		
	}
	
	public function rtemp($name) {
		global $cp,$config,$_GET,$_POST,$_FILES,$_SERVER,$db,$helper,$class;
		if($cp->sub=="") {
			$f = $config['path']."/_src/".$config['script']."/_templates/_html/".$config['themes']."/".$name.".php";
		} else {
			$f = $config['path']."/_src/".$config['script']."/_templates/_html/".$config['themes']."/".$cp->sub."/".$name.".php";
		}
		
		if(file_exists($f)) {
			$html = file_get_contents($f);
			if(strpos($html,'{THEME}') > 0 ) {
				$html = str_replace("{THEME}",_URL_."/themes/".$config['script']."/".$config['themes'],$html);
			}
			return $html;
			
		} else {
			debug("FILE NOT FOUND",$f);
		}		
	}	
	
	public function rvar($html,$data) {
		$html = str_replace("{URL}",_URL_,$html);
		$html = str_replace("{THEME}",themes(),$html);		
		foreach ($data as $key=>$value) {
			$html = str_replace("{".$key."}", un_quotes($value),$html);
		}
		return $html;
	}
}

?>