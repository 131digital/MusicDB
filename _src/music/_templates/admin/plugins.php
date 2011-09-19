<?php
class Tadmin_plugins extends templates {
	var $template = "global";
	
	public function sidebar() {
		
	}
	
	public function main_html() {
		$this->ftemp("plugins.main");
	}
	
	function install_plugins($name) {
		global $helper,$db;
		
		$ht = $db->fast_get("cronjob","cron_name='".safe_quotes($name)."'");
		if($ht == false) {
			$data = array(
				"cron_name"	=> $name,
				"cron_time"	=>	15,
				"cron_status"	=> "active",
				"cron_interval"	=> "MINUTE"
			);
			$db->insert("cronjob",$data);
			
			$ht = $db->fast_get("cronjob","cron_name='".safe_quotes($name)."'");
		}
		
		return $ht;
		
	
	}
	
	function edit_plugins() {
		$this->ftemp("plugins.edit");
	}
	
	
	function get_plugins() {
		global $config;
		$path = $config['path']."/_src/".$config['script']."/_plugins";
		$dir = opendir($path);
		$html = '';
		while($file=readdir($dir)) {
			if(($file!=".")&&($file!="..")&&(strpos($file,"index") === false)) {
				$f = $path."/".$file;
				$name = str_replace(".php","",$file);
				
				// get desc
				$data = file_get_contents($f,NULL,NULL,0,1000);
				$ex = explode("*/",$data,3);
				$pos = strpos($ex[0],"/*");
				$des = substr($ex[0],$pos+2);
				$ht = $this->install_plugins($name);
				
				$html.="<tr>
					<td>".$ht['cron_name']."</td>
					<td>$des</td>
					<td>".$ht['cron_status']."</td>
					<td>".$ht['cron_time']." ".$ht['cron_interval']."</td>
					<td>".$ht['cron_last_update']."</td>
					<td>
					<input type='button'  value='Edit' onclick=window.location='"._URL_."/admin/plugins/?action=edit&name=$name';  />
			        <input type='button' class='red' value='Run' onclick=window.location='"._URL_."/admin/plugins/?action=run&name=$name'; />
					</td>
				</tr>";
			}
		}
		
		return $html;
		
	}
	
	function run_plugins() {
		global $helper;
		$name  = $helper->fast("name",1);
		run_plugins($name,"index",true);
	}
}
?>