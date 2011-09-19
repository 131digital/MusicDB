<?php

class Cadmin_login extends controllers {
	public function index() {
		global $output,$config;
		$output->show_login();					
	}
	
	public function ajax_submit() {
		global $_POST,$config;
		$log = false;
		
		if((isset($_POST['username'])) && (isset($_POST['password']))) {
			$username = $_POST['username'];
			$password = $_POST['password'];	
		} else {
			$log = false;
			exit;
		}			
		
		$count = count($config['admin']);
		for($i=1;$i<=$count;$i++) {
			if(($username == $config['admin'][$i]['username']) && ($password == $config['admin'][$i]['password'])) {
						// do session
						$this->create_login_session($username,$password,$i);	
						$log = true;					
			} 
		}
			
				
		if($log == true ) {
			
					$json['result'] = 'ok';
					$json['text'] = "Thank you, you're logined!";
					$json['title'] = "Login Success!";
		} else {
					$json['result'] = 'error';
					$json['title'] = "Some thing wrong";
					$json['text'] = "Sorry, wrong username or password!";
		}		
		
		echo create_json($json);		
	}
}

?>