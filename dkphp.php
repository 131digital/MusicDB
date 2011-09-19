<?php
	error_reporting(E_ALL | E_STRICT); // remove this line when no dev any more
	
	ini_set('display_errors','On');
	ini_set('log_errors','On');
	
	// only receive PHP, HTML 
	
	$ex = explode(".",$_SERVER['REQUEST_URI'],100);
	if(count($ex) >= 90) {
		exit;
	}
	$ex = $ex[count($ex)-1] ;
	$accept = array("js","html","css");
	if((!in_array($ex,$accept))&&(strpos($ex,"/") === false)&&(strpos($ex,"&") === false)) {
		exit;
	}
	

	
	require("inc.config.php");
	
	if(!isset($config['script'])) {
		echo "Please Config The Scripts";
		exit;
	}
	
	require("./_src/config/_functions.php");
	
	if((isset($config['session']))&&($config['session']==true)) {
		session_start();
		ini_capcha();
		if(isset($_GET['capcha'])) {
			show_capcha();
		}
		
	}
	
	header("content: text/html");
		
	// define
	define("_URL_", $config['url']);
	define("_THEME_", $config['url']."/themes/".$config['script']."/".$config['themes']);
	define("_IN_",1);
	
	if(function_exists("mb_internal_encoding")) {
		mb_internal_encoding($config['mb_string']); 
	}	
		
	
	
	require("./_src/config/_controllers.php");
	require("./_src/config/_templates.php");
	require("./_src/config/_helper.php");
	require("./_src/config/_mysql.php");
	require("./_src/".$config['script']."/_functions.php");	
	require("./_src/".$config['script']."/_before.php");
	// get action
	
	$action = action();
	
	if($action == "") {
		$action = "home";
	}
	
	$sub = "";
	


	// connect db
	$db = new mysql();
	
	$cp = new controllers();	
	$cp->name = "cp";
	$helper = new helper();
	
	// check sub dir
	if($action == "ajax.") {
		// go ajax
		require("./_src/config/_ajax.php");
		$action = new Ajax();		
		$action->run();
		exit;
	}
	
	if($action == "js.") {
		// go ajax
		require("./_src/config/_js.php");
		$action = new JS();		
		$action->run();
		exit;
	}	
	
	if($action == "plugins.") {
		// go ajax
		require("./_src/config/_plugins.php");
		$action = new PLUGINS();
		$action->run();
		exit;
	}		

	$db->connect();
	$db->set_db();
		
	if(get_main_cp($action)!=false) {
		$sub = $action;
		$action = action(1) != "" ? action(1) : "home";
	}	
	
	
	
	
	
	$cp->sub = $sub;
	$cp->action = $action;
	
	
	if(get_controller($action)==false) {
			$action = "404page";
	}			
				
	if(get_controller($action)!=false) {	
		require_once(get_controller($action));
	} else {
		exit;
	}		
	
	$class = ini_cp($action);
	if(class_exists($class)) {
		$class = new $class();
		$class->name = $action;
	} else {
		debug("NO CLASS",$class);
		exit;
	}
	

	$language = $config['language'];
	
	if(get_language($language)!=false) {
		require_once(get_language($language));
	}
	
	if(get_language($language,$class->name)!=false) {
		require_once(get_language($language,$class->name));
	}
		
	if(file_exists(get_template($action))) {
		require_once(get_template($action));
		$output = ini_temp($action);		
		$output = new $output();
	} else {
		$output = new templates();
	}
	

	$class->processing();
	
	if(isset($output->template)) {
		// create template
		$ex = explode("|",$output->template);
		foreach($ex as $name) {
			$output->ftemp($name.".template");
		}
			
	}elseif(isset($output->themetemplate)) {
		// create template
		$ex = explode("|",$output->themetemplate);
		foreach($ex as $name) {
			$output->ftheme($name.".template");
		}	
	
		
	}	
	
	require("./_src/".$config['script']."/_after.php");	
		

	$db->close();	
?>