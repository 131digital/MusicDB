<?php

class Cactivate extends controllers {
	function index() {
		global $helper,$output;
	
		$email = $helper->fast("email",5,"email");
		$code = $helper->fast("code",2,"number");
		
		
		if(($email!="") && ($code!="")) {
			$res = $this->check_account($email,$code);
			if($res == true) {
				$this->update_account($email);
				$output->success();
			} else {
				$output->wrong();
				
			}
		} else {
			$output->wrong();
		}
		
	}
	
	private function check_account($email,$code) {
		global $db;
		$u = $db->fast_get("users","email='".safe_quotes($email)."' AND user_code='".safe_quotes($code)."' AND user_status='pending'");
		if($u == false) {
			return false;
		} else {
			return true;
		}
	}
	
	private function update_account($email) {
		global $db;
		$data = array(
			"user_status" => 'active'
		);
		$db->update("users",$data,"email='".safe_quotes($email)."' AND user_status='pending'");
	}
}

?>