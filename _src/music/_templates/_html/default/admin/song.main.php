<?php

	$action = (isset($_GET['action'])) ? $_GET['action'] : "newsong";
	
	if($action == "search") {
		$this->ftemp("song.main.search");
	}else			
	if($action == "edit") {		
		$this->ftemp("song.main.edit");

	} else
	if($action == "addnew" ) {
		$this->ftemp("song.main.addnew");	
	} else 
	if($action =="newsong") {
		$this->ftemp("song.main.search");
	}
	
	
	
?>