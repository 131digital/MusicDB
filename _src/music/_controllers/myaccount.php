<?php
class Cmyaccount extends controllers {
	var $login = "db_login";
	
	function ajax_update() {
		global $db,$helper,$config;
		
		// update all info except password and email
		$user_key = $helper->risk("user_key",1,"number");
		if($user_key != $this->user_info['user_key']) {
			debug("Wrong User Key Update",$user_key." != ".$this->user_info['user_key']);
			exit;
		}
		
		$helper->error = "";
		$error = false;
		
		$user_fname = $helper->fast("user_fname",2,"",xlang("First Name"));		
		$user_lname = $helper->fast("user_lname",2,"",xlang("Last Name"));		
		$user_birthday = $helper->fast("user_birthday",5,"",xlang("Your Bithday"));		
		$user_sex = $helper->fast("user_sex",2,"",xlang("Sex"));
		$user_country = $helper->fast("user_country",2,"",xlang("Please select a country"));			
		$user_city = $helper->fast("user_city");	
		$user_state = $helper->fast("user_state");	
		$user_address = $helper->fast("user_address");	
		$user_zipcode = $helper->fast("user_zipcode");				
		$user_phone = $helper->fast("user_phone");								
		$user_mail = $helper->fast("user_mail");								
		$email = $helper->fast("email",8,"email",xlang("E-Mail@Domain.com"));	
		
		if($helper->error=="") {
			$data = array(
				"user_fname" => $user_fname,
				"user_lname"	=> $user_lname,
				"user_birthday"	=> @date("Y-m-d",strtotime($user_birthday)),
				"user_sex"	=> $user_sex,
				"user_country"	=> $user_country,
				"user_city"	=> $user_city,
				"user_state"	=> $user_state,
				"user_address"	=> $user_address,
				"user_zipcode" => $user_zipcode,
				"user_phone"   => $user_phone,
				"user_mail"	=> $user_mail
			);
			$error = true;
		} else {
			$error = false;
		}
		
		$change_email = false;
		if($email!=$this->user_info['email']) {
			// update email
			$u = $db->fast_get("users","email='".safe_quotes($email)."'");
			if($u == false) {
				// OK
				$data['email'] = $email;
				$data['user_code'] = rand(100,999);
				$change_email = true;
				
			} else {
				$helper->make_error(xlang("E-Mail was used by other account"));
				$error = false;
			}
		}
		
		$password = $helper->fast("password");
		if($password!="") {
			if(md5($password)!= $this->user_info['password']) {
				$helper->make_error(xlang("Please Enter Current Password"));
				$error = false;
			} else {
				$newpassword = $helper->fast("newpassword",6,"",xlang("New Password is minimum 6 characters"));
				$renewpassword = $helper->fast("renewpassword",6,"",xlang("Confirm New Password"));	
							
				if($newpassword!=$renewpassword) {
					$helper->make_error(xlang("Confirm New Password"));
					$error = false;
				} elseif($helper->error=="") {
						$data['password'] = md5($newpassword);
				}								
			}
		}
		
		
		if(($helper->error!="")||($error==false)) {
			
			$json['result'] = 'error';
			$json['text'] = $helper->error;
			$json['title'] = xlang("Error");
		} else {
			$json['result'] = 'ok';
			$json['text']	= xlang("Updated");
			$json['title'] = xlang("Account Information");
			$db->update("users",$data,"user_key='".safe_quotes($user_key)."'",1);
			
			if($change_email == true) {
				
				$data['website_name'] = $config['domain'];
				$data['website_url']  = _URL_;

					
				$subject=xlang("New Account")." - ".$config['domain'];									
				
				$body = $helper->output->rtheme("email.confirm");
				$body = $helper->output->rvar($body,$data);
				
				$helper->send_mail("php",$email,$subject,$body); 
			}
		}
		
		echo create_json($json);
		
	}
	
	function index() {
		
	}
}
?>