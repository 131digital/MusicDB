<?php

class Cregister extends controllers {
	function index() {
		global $helper;
		if(isset($helper->data['username'])) {
			change_location("");
		}		
	}
	
	function ajax_register() {
		global $db,$helper,$output,$config;
		
		if($this->logined == true) {
			exit;
		}
			
		$helper->reset_error();
		$user_fname = $helper->fast("user_fname",2,"",xlang("First Name"));
		
		$user_lname = $helper->fast("user_lname",2,"",xlang("Last Name"));
		$email = $helper->fast("email",8,"email",xlang("E-Mail@Domain.com"));	
		$reemail = $helper->fast("reemail",8,"email",xlang("Confirm E-Mail Again"));	
		
		$user_birthday = $helper->fast("user_birthday",5,"",xlang("Your Bithday"));
		
		$password = $helper->fast("password",6,"",xlang("Password Minimum is 6 characters"));
		
		$user_sex = $helper->fast("user_sex",2,"",xlang("Sex"));
		$user_country = $helper->fast("user_country",2,"",xlang("Please select a country"));
		
		$tos = $helper->fast("agree",1,"number",xlang("Sorry, you must agree with our Terms Of Services to sign up an account"));
		
		$user_mail = $helper->fast("user_mail");
		
		
		
		if($email!=$reemail) {
			$helper->make_error(xlang("Confirm E-Mail Again"));
		}
		$error = false;
		if($helper->error=="") {
			// check duplicated email in system or not
			$u = $db->fast_get("users","email='".safe_quotes($email)."'");
			if($u == false) {
				// new user
				
				$data = array(
					"user_fname"	=> $user_fname,
					"user_lname"	=> $user_lname,
					"email"			=> $email,
					"password"		=> md5($password),
					"user_sex"		=> $user_sex,
					"user_country"	=> $user_country,
					"user_mail"		=> $user_mail,
					"user_status"	=> "pending",
					"user_code"		=> rand(100,999),
					"user_birthday"	=>  @date("Y-m-d",strtotime($user_birthday))
				);
				$db->insert("users",$data);
				
				$json['result'] = 'ok';
				$json['text']	= xlang('Thank you, now you can login and create your own playlist!');
				$json['title']	= xlang('Registered New Account');
				
				$data['website_name'] = $config['domain'];
				$data['website_url']  = _URL_;

					
				$subject=xlang("New Account")." - ".$config['domain'];									
				
				$body = $helper->output->rtheme("email.confirm");
				$body = $helper->output->rvar($body,$data);
				
				$helper->send_mail("php",$email,$subject,$body); 
			//	debug($body);					
				
				$error = true;
			} else {
				$helper->make_error(xlang("Sorry, someone have used this email for sign up already."));
			}
			
		} else {
			$error = false;
		}
		
		if($error == false) {
			$json['result'] = 'error';
			$json['text']	= xlang('<h4>Please check your information again</h4>').$helper->error;
			$json['title']	= xlang('Register Account');			
		}
		
		echo create_json($json);
		
	}
	
}

?>