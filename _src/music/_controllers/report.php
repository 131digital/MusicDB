<?php

class Creport extends controllers {
	function index() {
	}
	
	function ajax_submit() {
		global $db,$helper;
		
		$helper->reset_error();
		$subject = $helper->fast("subject",3,"",xlang("please enter subject"));
		$url = $helper->fast("url",3,"",xlang("please enter url"));
		$type = $helper->fast("type",3,"",xlang("please select category"));
		$message = $helper->fast("message",5,"",xlang("please enter your message"));
		$capcha = $helper->fast("capcha",1,"",xlang("please enter capcha"));
		$email = $helper->fast("email",5,"email",xlang("please enter your email"));
		
		if($capcha != read_capcha()) {
			$helper->make_error(xlang("wrong capcha"));
		}
		
		if($helper->error!="") {
			$json['result'] = 'error';
			$json['title'] = 'Request Error';
			$json['text']  = "Please check again.".$helper->error;
			echo create_json($json);
			exit;
		} 
		
		$data = array(
			"box_title"	=> $subject,
			"box_type"	=> $type,
			"box_text"	=>	$message."\n".$url."\nE-Mail: ".$email,
			"box_status"  => "pending"
		);
		$db->insert("mail_inbox",$data);
		create_new_capcha();
		$json['result'] = 'ok';
		$json['title'] = 'Submit Completed';
		$json['text']  = "Thank you, we will reply you back in 24 - 48 hours";
		echo create_json($json);		
		
	}
}

?>