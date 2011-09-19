<?
class JS extends controllers {
	public function run() {
		global $config,$db,$cp,$_SESSION,$_SERVER;
		// start detect sub / action
		$type = action(1);
		$action = action(2); 

			
		$sub = "";
	
		if(get_main_cp($action)!=false) {
			$sub = $action;
			$action = action(3) != "" ? action(3) : "global";
		}	
			
		$file = str_replace(".js","",$action);
		
		if($type == "tmp") {
			if($sub != "") {
				$f = $config['path']."/_src/".$config['script']."/_templates/_html/".$config['themes']."/".$sub."/".$file.".javascripts.php";
			} else {
				$f = $config['path']."/_src/".$config['script']."/_templates/_html/".$config['themes']."/".$file.".javascripts.php";
			}
								
		}else{ 
			if($sub != "") {
				$f = $config['path']."/themes/".$config['script']."/".$config['themes']."/".$sub."/".$file.".javascripts.php";
			} else {
				$f = $config['path']."/themes/".$config['script']."/".$config['themes']."/".$file.".javascripts.php";
			}		
		}
		header("Content-type: text/javascript");
		if(file_exists($f)) {
			require($f);
		}
		exit;
	}
}
?>