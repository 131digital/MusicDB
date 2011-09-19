<?php


class Cadmin_home extends controllers {
	
	public function index() {
		global $config;
		change_action("login");
		// $this->simple_login($config['admin']['username'],$config['admin']['password'],"login");
	}
	
}

?>