<?php

class Tbuyalbum extends templates {
	
	function index() {
		
		$tmp = $this->rtheme("buyalbum");
		
		$data['song_name']=$_GET['song_name'];
		$data['song_artist']=$_GET['song_artist'];
		
		echo $this->rvar($tmp,$data);
		
	}
	
}

?>