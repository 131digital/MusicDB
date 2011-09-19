<?php

class Cadmin_plugins extends controllers {
	var $login = "simple_login";
	public function index() {
	}
	
	public function ajax_edit() {
		global $_POST,$db,$helper;
		
		$cron_name = $helper->fast("cron_name",1);
		$cron_time = $helper->fast("cron_time",1);
		$cron_status = $helper->fast("cron_status",1);
		$cron_interval = $helper->fast("cron_interval",1);
		
		$data = array(
			"cron_time"	=> $cron_time,
			"cron_status"	=> $cron_status,
			"cron_interval"	=> $cron_interval			
		);
		
		$db->update("cronjob",$data,"cron_name='".$cron_name."'");
		
		$json['result'] = 'ok';
		$json['text']	= "Updated Cronjob - Plugins: ".$cron_name;
		$json['title']	= "Cronjob Update";
		
		echo create_json($json);
	}
}
?>