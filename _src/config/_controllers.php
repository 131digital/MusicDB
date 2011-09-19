<?php
class controllers {
	var $name="";
	var $sub="";
	var $action="";
	var $logined=false;		
	var $login="";
	var $simple_login = array();
	var $required_modules = "";
	var $user_info = array();
	
	public function controllers() {
		if($this->required_modules!="") {
			$modules = explode("|",$this->required_modules);
			foreach($modules as $mod) {
				required_modules($mod);
			}
		}		
	}
	
	
	public function processing() {				
		if($this->login != "") {
			$func=$this->login;
			$this->$func();
		}
		
		$this->index();
	}
	
	public function create_login_session($user,$pass,$id,$table="",$cols="") {
		global $_SESSION,$config;
		if(isset($config['session.expire'])) {
			session_cache_expire($config['session.expire']);
		}
		
		$_SESSION['username'] = $user;
		$_SESSION['password'] = md5($pass);
		$_SESSION['id'] = $id;
		if($table!="") {
			$_SESSION['table'] = $table;
		}
		if($cols!="") {
			$_SESSION['cols'] = $cols;
		}
	}
	
	public function clean_login_session() {
		global $_SESSION;
		$_SESSION['username'] = NULL;
		$_SESSION['password'] = NULL;
		$_SESSION['id'] = NULL;		
		if(isset($_SESSION['table'])) {
			$_SESSION['table'] = NULL;
		}
		if(isset($_SESSION['cols'])) {
			$_SESSION['cols'] = NULL;
		}
		
	}
	
	public function db_login() {
		global $_SESSION,$helper,$db;
		
		if((!isset($_SESSION['cols']))||(!isset($_SESSION['table']))) {
			$this->clean_login_session();
			change_location("login");
			exit;
		}
		
		$table = $_SESSION['table'];
		$cols = $_SESSION['cols'];
		
		$ex = explode(",",$cols,10);
		if(count($ex) <3) {
			$this->clean_login_session();
			change_location("login");
			exit;
		}
		$u = $db->fast_get($table,"`".$ex[0]."`='".$_SESSION['id']."' AND `".$ex[1]."`='".$_SESSION['username']."' AND `".$ex[2]."`='".$_SESSION['password']."'");
		if($u == false) {
			$this->clean_login_session();
			change_location("login");
			exit;
		} else {
			$this->user_info = $u;
		}
		
	}
	
	
	// simple login, with user, pass in $config['admin']['username']
	
	public function simple_login($user="",$pass="",$login_url = "login") {
		global $_SESSION,$config;
		if((!isset($_SESSION['username'])) || (!isset($_SESSION['password']))) {
			
			$this->logined = false;
			if($login_url == "") {
				return false;
			} else {
				change_action($login_url);
			}
			
		}
		
		if(($user == "") && ($pass == "")) {
			$i = $_SESSION['id'];
			$user = $config['admin'][$i]['username'];
			$pass = $config['admin'][$i]['password'];
		}
		
		if(($_SESSION['username'] == $user) && ($_SESSION['password'] == md5($pass))) {
			$this->logined = true;
				
		} else {
			$this->logined = false;
			if($login_url != "") {
				change_action($login_url);
			}
		}
	}
	

		
	
}

?>