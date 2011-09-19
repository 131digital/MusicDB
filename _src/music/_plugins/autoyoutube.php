<?php
/*
 Auto Add Youtube ID Streaming for Song Status Waiting
*/
set_time_limit(0);
if(_IN_!=1) {
	exit;
}


class PLUGINS_autoyoutube extends controllers {
	var $mute = false;
	var $required_modules = "fast_function";
	
	public function index() {
		global $db,$helper;
		$db->connect();
		$db->set_db();
		
		update_cron_time("autoyoutube");		
		
		$sql = $db->get("songs","*","song_status='waiting' AND (song_youtube IS NULL OR song_youtube='') AND (song_url IS NULL OR song_url = '') AND (song_broken IS NULL OR song_broken = '')",10);
		$dem=0;
		while($ht = $db->fetch($sql)) {
			
			$songname = un_quotes($ht['song_name']);
			$artist = get_artist(un_quotes($ht['song_artist']));				
			$result = update_youtube($ht['song_key'],$songname,$artist);
			
			if($result == true) {
				if($this->mute == true ) 
					echo "Updated : ".$songname."<br>\n";
			} else {
				if($this->mute == true ) 
					echo "Failed : ".$songname."<br>\n";
			}
			$dem++;
			
		}
		if($dem>=10) {
			if($this->mute==true) {
				echo "<script>
					setTimeout('window.location=window.location;',2000);
					</script>";
				echo ".... Reloading in 2 seconds ...";
			}
		}
		
	}
	
	
}






?>