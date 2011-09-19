<?php
		
class PLUGINS extends controllers {	
	var $required_modules = "fast_function";
	public function run() {
		global $config,$_GET,$helper,$_SESSION,$_SERVER,$helper;
		
		$plug = action(1);		
		$key = $helper->fast("r",1);
		if($key!=$config['plugins.security']) {
			$helper->check_ref();
		}
		
		// find plugins
		run_plugins($plug,"index",true);
		
		
	}	
	

}
	
?>