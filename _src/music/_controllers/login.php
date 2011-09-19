<?php
class Clogin extends controllers {
	
	function index() {
		global $helper;
		if(isset($helper->data['username'])) {
			change_location("");
		}
	}
	
	function ajax_loginbox() {
		global $helper;
		$html = $helper->output->rtheme("login.box");
		$json['html'] = $html;
		echo create_json($json);
	}
	
	function ajax_login() {
		global $db,$helper;
		
		$helper->reset_error();
		$error=false;
		
		$email = $helper->fast("email",5,"email",xlang("E-Mail")); 	
		$password = $helper->fast("password",5,"",xlang("Password")); 
		
		if(($email!="")&&($password!="")) {
			$u = $db->fast_get("users","email='".safe_quotes($email)."' and password='".safe_quotes(md5($password))."'");	
			if($u == false) {
				$error=false;
				$helper->make_error(xlang("Wrong Username or Password"));
			} else {
				$this->create_login_session($email,$password,$u['user_key'],"users","user_key,email,password");
				$error=true;
			}
		} else {
			$error=false;
		}
		
		if($error==false) {
			$json['result'] = 'error';
			$json['text'] = $helper->error;
			$json['title'] = "Login Failed";
		} else {
			$json['result'] = 'ok';
			$json['text'] = xlang("Thank You, You have logined.");
			$json['title'] = "Logined To System";
		}
		
		echo create_json($json);
			
	}
}
?>