<?
class Ajax extends controllers {
	public function get_seo() {
		global $_POST,$config;
		if(!isset($_GET['text'])) {
			die("TEXT REQUIRED");
		}
		$text = $_GET['text'];
		$json['data'] = ini_seo($text);
		echo create_json($json);		
	}
	
	public function update_order_box() {
		global $_POST,$db;
		
		$table = safe_quotes($_POST['table']);
		$col_key = safe_quotes($_POST['col_key']);
		$col_order = safe_quotes($_POST['col_order']);
		$key = safe_quotes($_POST['key']);
		$value = safe_quotes($_POST['new_value']); 
		// risk security with order column
		if(strpos($col_order,"order") === false ){
			debug("HACKING SYSTEM", "ORDER COLUMN RISK");
			exit;
		}

		$db->connect();
		$db->set_db();
		
		$data = array(
			$col_order => $value
		);		
		$sql = $db->update($table,$data,"`".$col_key."`='".$key."'");
		if($sql) {
			$json['result'] = 'ok';
		}else {
			$json['result'] = 'error';
		}
		echo create_json($json);
		
	}
	
	public function run() {
		global $config,$db,$cp,$_SESSION,$_SERVER,$helper;						
	
		$action = action(1); 
		$function = action(2);
		
		if(method_exists($this,$action)) {
			$this->$action();
			exit;
		}

		// start detect sub / action
		$db->connect();
		$db->set_db();
		
				
		if($action == "") {
			$action = "home";
		}
		
		$sub = "";
		
		if(get_main_cp($action)!=false) {
			$sub = $action;
			$action = action(2) != "" ? action(2) : "home";
			$function = action(3);
		}	
		
		$cp->sub = $sub;
		$cp->action = $action;
			
		
		if($function == "") {
			// no function;
			exit;
		}
														
		if(get_controller($action)==false) {
				$action = "404page";
		}			
					
		if(get_controller($action)!=false) {	
			require_once(get_controller($action));
		} else {
			// no controllers
			exit;
		}				
		
		$class = ini_cp($action);
		
		if(class_exists($class)) {
			$class = new $class();
			$class->name = $action;
		} else {
			debug("NO CLASS","AJAX ".$class);
			exit;
		}
	
		
		$class = new $class();
		$class->name = $action;				
		
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
		
		$helper->check_ref();
		
		if($class->login != "") {
			$func=$class->login;
			$class->$func();
		}
		
		if(method_exists($class,'ajax_'.$function)) {		
			$str = '$class->ajax_'.$function.'();';
			eval($str);
		} else {
			debug("HACKING SYSTEM",$_SERVER['HTTP_REFERER']." - AJAX - NO METHOD ".$function);
			
		}
	
		$db->close();		
			
		
		
	}
}
?>