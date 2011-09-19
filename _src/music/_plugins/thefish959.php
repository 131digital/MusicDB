<?php
/*
Auto add artist and songs from website thefish959.com
*/

if(_IN_!=1) {
	exit;
}

class PLUGINS_thefish959 extends controllers {
	var $mute = false;
	var $required_modules = "simple_html_dom|fast_function";
	public function index() {
		global $db,$helper;
		
		$db->connect();
		$db->set_db();
		
		update_cron_time("thefish959");
			
		$src = "http://www.thefish959.com/jsfiles/LastPlayed.aspx";
		$html = file_get_contents($src);
		$html = str_get_html($html);
		$dem=0;
		
		function replace_name($name) {
			$array = array("*");
			return trim(str_replace($array,"",$name));	
		}
		
		foreach($html->find("tr") as $data) {
			// skip header
			if($dem>0) {
				// first td is song name
				$songname=replace_name($data->find("td",0)->plaintext);
				// second is artist
				$artist=replace_name($data->find("td",1)->plaintext);
				// echo $songname." - ".$artist."<br>";
				if(($artist!="") && ($songname!="") && (preg_match("/[a-zA-Z0-9\s]+/",$songname)) && (preg_match("/[a-zA-Z0-9\s]+/",$artist))) {
					// check duplicated in DB artist or not
					$art_key = new_artist($artist,$this->mute);
					
					if($art_key!=false) {
						$db->fast_increase("artist","art_order","art_key='".$art_key."'",1);
					}
					
					$song_key = new_song($songname,$artist,$this->mute);			
					if($song_key!=false) {							
						$u = $db->fast_get("songs_stats","song_key='".$song_key."' AND song_time='".@date("YW")."'");
						if($u == false) {
							$data= array(
								"song_key" =>$song_key,
								"song_like" => 1,
								"song_views" => 1,
								"song_time"  => @date("YW")
							);
							$db->insert("songs_stats",$data);
							if($this->mute==true) {
								echo "Add Like For : ".$songname." ".$song_key." <br>\n";
							}							
						} else {
							$db->fast_increase("songs_stats","song_like","song_key='".$song_key."' AND song_time='".@date("YW")."'");
							if($this->mute==true) {
								echo "Update Like For : ".$songname." ".$song_key." <br>\n";
							}									
						}
						$db->fast_increase("songs","song_like_all","song_key='".$song_key."'");
					}
				}
				
			}
			$dem++;
		}		
	}
	
}


?>