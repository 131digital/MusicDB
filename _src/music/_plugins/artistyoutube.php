<?
/*
Auto Update Songs For Artist In Youtube
*/
set_time_limit(0);

if(_IN_!=1) {
	exit;
}



class PLUGINS_artistyoutube extends controllers {
	var $mute = false;
	var $required_modules = "simple_html_dom|fast_function";
	public function index() {
		global $db,$_GET;
		
		$db->connect();
		$db->set_db();
		update_cron_time("artistyoutube");
		$this->run();
		
	}
	

	
	public function run() {
		global $helper,$db,$_GET;
		if((isset($_GET['name']))&&(!isset($_GET['action']))) {
			$name = $helper->fast("name",2);
			if($name!="") {
				$sql = $db->get("artist","*","art_name='".safe_quotes($name)."'",1);		
			}
		} else {
		
			$sql = $db->get("artist","*","art_auto_update='yes' AND (art_youtube <> '' AND art_youtube IS NOT NULL) AND 
										(art_last_update IS NULL OR art_last_update <= DATE_ADD(curdate(), INTERVAL -30 DAY) )",3);
		}
				
		
		while($ht = $db->fetch($sql)) {
			$art_key = $ht['art_key'];
			$src = $ht['art_youtube'];
			// $src = "http://www.youtube.com/artist/Newsboys";
	
				
			$html = file_get_contents($src);
			
			if(!$html) {
				debug("CANT GET HTML AUTO UPDATE",$src);
				if($this->mute == false) {
					echo "CANT GET HTML AUTO UPDATE : ".$src;
				}
				$data = array(
					"art_last_update" => "__ NULL",
					"art_auto_update"	=> "no"
				);
				
				$db->update("artist",$data,"art_key='".$art_key."'");	
				exit;
			} 
			
			if(strpos($html, 'data found') === false ) {
				if($this->mute == true) {
						echo "Updated ". $ht['art_name']." at ".$src."<br>\n";
				}				
			
				$html = str_get_html($html);
				
				$data = array(
					"art_last_update" => "__ NOW()"
				);
				$bio = "";
				if($html->find("span[class='info']",0)!="") {
					$bio = $html->find("span[class='info']",1)->innertext;
					if(($ht['art_bio'] == "")&&($bio!="")) { 
						$data['art_bio'] = $bio;
					}			
				}
			
					
				$similar = '';	
				
				foreach($html->find("div[class='similar-artist']") as $d) {
					$similar .= $d->plaintext.", ";
				}
				
				
				if(($similar!='')&&($ht['art_similar']=="")) {
					$data['art_similar'] = $similar;
				}
				
				$db->update("artist",$data,"art_key='".$art_key."'");
				$artist = $ht['art_name'];
					
				foreach($html->find("span[class*='album-track-name']") as $data) {
					$songname = trim($data->plaintext);
					new_song($songname,$artist,$this->mute);
				}	
			} else {
				if($this->mute == true) {
					echo "Cancel ".$ht['art_name']." at ".$src."<br>\n";
				}						
				$data = array(
					"art_last_update" => "__ NULL",
					"art_auto_update"	=> "no"
				);
				
				$db->update("artist",$data,"art_key='".$art_key."'");					
			}
			
		}		
		
	}
	
}

?>