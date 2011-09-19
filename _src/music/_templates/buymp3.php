<?php

class Tbuymp3 extends templates {
	
	function index() {
		
		$tmp = $this->rtheme("buymp3");
		
		$data['song_name']=$_GET['song_name'];
		$data['song_artist']=$_GET['song_artist'];
		
		echo $this->rvar($tmp,$data);
		
	}
	
}

?>