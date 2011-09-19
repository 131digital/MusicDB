<?php
/* Auto Fix Song Broken by Add YouTube ID, if failed again, set it to inactive song */

class PLUGINS_AutoFixSongBroken extends controllers {
	var $mute = false;
	var $required_modules = "fast_function";
	function index() {
		global $db,$helper;
		
		$db->connect();
		$db->set_db();
		
		update_cron_time("AutoFixSongBroken");
		
		$sql = $db->get("songs","*","song_name=''");				
		while($ht = $db->fetch($sql)) {
			$key =$ht['song_key'];
			if($this->mute==true) {
				echo "Delete Song Key: ".$key."<br>\n";
			}
			
			$x = $db->delete("songs","`song_key` = '".$key."'",1);
			$x = $db->delete("songs_lyrics","`song_key` = '".$key."'",1);		
			$x = $db->delete("songs_rating","`song_key` = '".$key."'",1);
			$x = $db->delete("songs_stats","`song_key` = '".$key."'",1);	
		}
		
		$sql = $db->get("songs","*","song_broken IS NOT NULL AND (song_status='active' OR song_status='waiting')");
		
		while($ht = $db->fetch($sql)) {
			$key = $ht['song_key'];
			$youtube = fast_youtube(un_quotes($ht['song_name']),get_artist(un_quotes($ht['song_artist'])));
			if($this->mute == true)
				echo "YouTube ID = ".$youtube." ";
				
			if($youtube !=false ){
				// do update
				$data = array(
					"song_broken" => "__ NULL",
					"song_youtube"	=> $youtube,
					"song_status"	=> "active"
				);
				if($this->mute == true)
					echo "FIXED :".un_quotes($ht['song_name'])." <br>\n";
			} else {
				$data = array(
					"song_status"	=> "inactive"
				);				
				if($this->mute == true)
					echo "Set InActive :".un_quotes($ht['song_name'])." <br>\n";				
			}
			
			$db->update("songs",$data,"song_key='".$key."'");
		}
	}
}

?>