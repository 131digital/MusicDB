<?php

class Cadmin_logout extends controllers {
	public function index() {
		global $_SESSION;
		$_SESSION['username'] = NULL;
		$_SESSION['password'] = NULL;
		$_SESSION['id'] = NULL;
		
		change_action("login");
	}
}