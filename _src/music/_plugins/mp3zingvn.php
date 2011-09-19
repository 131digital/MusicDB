<?php
/*
	Auto Insert New Song From Mp3.Zing.vn
*/
set_time_limit(0);
if(_IN_!=1) {
	exit;
}

class PLUGINS_mp3zingvn extends controllers {
	var $mute = false;
	var $required_modules = "simple_html_dom|fast_function|cURL";
	public function index() {
		
		global $db,$helper;
		$db->connect();
		$db->set_db();
		
		update_cron_time("mp3zingvn");
		
		$src = "http://mp3.zing.vn";
		$html = file_get_contents($src);
		$html = str_get_html($html);
		$dem=0;						
		foreach($html->find("a[href^='/bai-hat']") as $a) {
			$title = $a->title;
			$title = explode("-",$title);
			$song = $this->song_name($title[0]);			
			
			$artist = $title[1];			
			$artist = $this->multi_artist($artist,true);
			
			new_song($song,$artist,$this->mute);
		}		
	}
	
	function song_name($name) {
		$name = trim(preg_replace("/[0-9]+\./","",$name));
		return $name;
	}
	
	function multi_artist($name,$newsong=false) {	
		$name = str_replace( array("-","_","+","!",".","`","'","\"","(",")","*","&","^","\$","@","="), " ",$name);	
		if(strpos($name,'ft.') === false) {
			if(strpos($name,",") === false ) {
				$name = explode("ft",$name);
			} else {
				$name = explode(",",$name);
			}
		}else {
			$name = explode("ft.",$name);
		}
		
		foreach($name as $art) {
			$art = super_trim(super_replace($art));
			new_artist($art,$this->mute);
			// update music from Mp3 Zing VN by Video Page
			if($newsong == true) {
				$this->update_artist_bio($art);
			}
			
		}
		return $name[0];
	}
	
	function update_artist_bio($name) {
		global $db,$helper,$config;
		$ht = $db->fast_get("artist","art_name ='".safe_quotes($name)."' AND art_bio IS NULL");
		if((($ht['art_bio'] == NULL) || ($ht['art_bio']==""))&&($ht!=false)) {
			//	http://mp3.zing.vn/tim-kiem/bai-hat.html?q=Kh%E1%BA%AFc+Vi%E1%BB%87t&t=artist
			// $html = file_get_contents("http://mp3.zing.vn/tim-kiem/bai-hat.html?q=".$name."&t=artist");
			$url = "http://mp3.zing.vn/tim-kiem/bai-hat.html?q=".str_replace(' ','+',$name)."&t=artist";
			$cURL = new cURL();
			$html = $cURL->get($url);
			
			if(strpos($html,'Ngày sinh') === false) {
				// no information, needt o update status
				$data = array(
					"art_bio"	=> ""
				);
				$db->update("artist",$data,"art_name ='".safe_quotes($name)."'");
				if($this->mute == true) {
					echo "No Information For: ".$name." <br>\n";
				}
			} else {
				// do fetch informtion
				$html = str_get_html($html);
				$bio = $html->find("div[id='_artistInfo']",0);
				$art_pic = $bio->find("img[border=0]",0);
								
								
				// remove all html except p span b i br
				$bio_html = trim(str_replace('Xem toàn bộ','',strip_tags($bio->outertext,"<b><p><br><i><strong>")));
				
				$art_link = $art_pic->src;
				
				if(($art_pic)&&($art_link)) {					
					$file = md5($art_link).".jpg";
					copy($art_link,$config['path']."/upload/artist/".$file);
					$art_link = _URL_."/upload/artist/".$file;
					$data['art_pic'] = $art_link;
				}
				$data['art_bio'] = $bio_html;				
				$db->update("artist",$data, "art_name ='".safe_quotes($name)."'");	
				echo "Update Bio: ".$name." <br> \n";
				
				foreach($html->find("a[href^='/bai-hat']") as $a) {
					$title = $a->title;
					$title = explode("-",$title);
					$song = $this->song_name($title[0]);										
					$artist = $title[1];							
					$artist = $this->multi_artist($artist);							
					new_song($song,$artist,$this->mute);
				}
																		
			}
			
					
			
		}
		
	}
			
}




?>