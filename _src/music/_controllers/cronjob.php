<?php
class Ccronjob extends controllers {
	function index() {
	global $helper,$config;
	
		$key = $helper->fast("r",1);
		if($key!=$config['plugins.security']) {
			if((strpos($config['ajax.allowed'],"localhost") === false )&&(!isset($_SERVER['HTTP_REFERER']))) {
						debug("Hacking System","NO HTTP REFERER ON AJAX");
						exit;
			} 
					
			if(isset($_SERVER['HTTP_REFERER'])) {
				$ref = $_SERVER['HTTP_REFERER'];
			} else {
				$ref = "http://localhost";
			}
			
			$ex = explode("/",$ref);
			$domain = $ex[2];
			if(isset($config['ajax.allowed'])) {
				if((strpos($config['ajax.allowed'],"localhost") === false )&&(strpos($config['ajax.allowed'],$domain) === false)) {
						debug("Risk Security Ajax Allowed Domain",$domain);
						exit;
				}			
			}			
		}
				
		echo "Running cronjob ... ";
			run_cron_jon();
		echo "Done";
	}
}
?>