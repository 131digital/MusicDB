<?php

class Cadmin_queue extends controllers {
	var $login = "simple_login";
	public function index() {
		global $output;												
	}
	
	
	public function ajax_view() {
		global $db,$helper;
		$key = $helper->fast("box_key",1,"number",xlang("number"));
		$data = $db->fast_get("mail_inbox","box_key='".safe_quotes($key)."'");
		$data['html'] = $data['box_text'];
		echo create_json($data);
	}
	
	public function ajax_delete() {
		global $db,$helper;
		$key = $helper->fast("box_key",1,"number",xlang("number"));
		$db->delete("mail_inbox","box_key='".safe_quotes($key)."'");

	}	
}

?>