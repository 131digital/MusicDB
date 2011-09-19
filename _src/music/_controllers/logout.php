<?php

class Clogout extends controllers {
	function index() {
		global $_SESSION;
		$this->clean_login_session();
		change_location("home");
	}
	
	function ajax_logout() {
		$this->clean_login_session();
		$json['result'] = 'ok';
		$json['text'] = xlang("Logout Done");		
		$json['title'] = xlang("Logout");
		echo create_json($json);
	}
}
?>