<?php
/* Auto Update Artkey for Song have NULL */
class PLUGINS_UpdateArtKeyForSongs extends controllers {
	var $required_modules = "fast_function";
	var $mute = false;
	function index() {
		global $db,$helper;
		
		$db->connect();
		$db->set_db();
		
		update_cron_time("UpdateArtKeyForSongs");
		
		$sql = $db->get("songs","*","art_key IS NULL OR art_key=0");
		while($ht = $db->fetch($sql)) {
			$name = clean_artist($ht['song_artist']);
			$key = $ht['song_key'];
			$art = $db->fast_get("artist","art_name='".$name."'");
			if($art!=false) {
				$data = array (
				"art_key" => $art['art_key']
				);
				
				$db->update("songs",$data,"song_key='".$key."'");
				
			} else {
				$data = array (
				"art_key" => 0
				);	
				$db->update("songs",$data,"song_key='".$key."'");			
			}
		}
		if($this->mute == true) {
			echo "Done";
		}
	}
}