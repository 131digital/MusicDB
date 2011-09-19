<?php

class Tadmin_queue extends templates {
	var $template = "global";
	
	function sidebar() {
		$this->ftemp("song.sidebar");
	}
	
	function main_html() {
		$this->ftemp("queue.main");
	}
	
	
}
?>