<?php


class Tmyaccount extends templates {
	var $themetemplate = "global";
	
	function main_body() {
		global $db,$helper,$class;
		
		$tmp = $this->rtheme("myaccount.main");
		$class->user_info['countries'] = $this->rtheme("list.countries");
		
		$html = $this->rvar($tmp,$class->user_info);
		
		echo $html;
	}
}

?>