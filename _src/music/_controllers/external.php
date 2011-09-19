<?php
class Cexternal extends controllers {
	var $required_modules = "mediaplayer";
	
	public function index() {
		global $_GET,$config,$helper;
		$act = action(1);
		
		$helper->check_ref();
		
		if(($act!="")&&(method_exists($this,"ext_".$act))) {
			eval('$this->ext_'.$act.'();');
		}
	}
	
	// auto complete return artist name
	private function ext_artists() {
		global $db,$config,$helper;			
		$name = $helper->fast("name","3","");
		$data = '';
		if(strlen($name) >= 2 ) {
			$sql = $db->get("artist","`art_name`,`art_key`","`art_name` LIKE '%".safe_quotes($name)."%'",30);
			while($ht = $db->fetch($sql)) {
				$data .= ',"'.un_quotes($ht['art_name']).'"';
			}				
			$data = substr($data,1);
			echo "var artist_list = [".$data."];";
		}
		
	}

	// auto complete return artist name
	private function ext_songs() {
		global $db,$config,$helper;
		$name = $helper->fast("name","3","");
		$data = '';
		if(strlen($name) >= 2 ) {
			$sql = $db->get("songs|INNER JOIN:artist:T1.art_key=T2.art_key","*","T1.`song_name` LIKE '%".safe_quotes($name)."%' OR T2.`art_name` LIKE '%".safe_quotes($name)."%'",30);
			while($ht = $db->fetch($sql)) {
				$data .= ',"'.un_quotes($ht['song_key']).'::'.un_quotes($ht['song_name']).' :: '.un_quotes($ht['art_name']).'"';
			}
			$data = substr($data,1);
			echo "var songs_list = [".$data."];";
		}

	}

	
	// replace youtube URL to youtubeID
	private function ext_youtube() {
		global $helper;
		$youtube = $helper->fast("youtube",5);
		$id = $helper->fast("id",3);
		
		$data = array("http://www.youtube.com/watch?v=","http://youtu.be/","http://youtube.com/watch?v=","http://www.youtube.com/?v=");
		$youtube = str_replace($data,"",$youtube);
		
		echo "document.getElementById('".$id."').value = '".$youtube."';";
		
	}
	
	
	private function ext_rating() {
		global $helper,$db,$_COOKIE;
		$song_key = $helper->risk("key",1);
		$song_rating = $helper->risk("score",1);
		$array = $helper->fast("ar");
		
		if(is_array($array)) {
			$table = $array[0];
			$tab = $array[1];
			$key_tab = $array[2];
			$cook = $table.'_'.$song_key;
			if(!isset($_COOKIE[$cook])) {
				$rating = $db->fast_get($table,$key_tab."='".safe_quotes($song_key)."'");
				$like_tab = ''.$tab.'_like';
				$rate_tab = "".$tab."_rate";
				$votes_tab = "".$tab."_votes";
				$avg_tab = "".$tab."_avg";
				
				if($rating === false) {
					// no thing
				} else {
					$rate = $rating[''.$tab.'_rate'] + $song_rating;
					$votes = $rating[''.$tab.'_votes'] + 1;
					$avg = round($rate / $votes,3);
					$data= array (
						$rate_tab	=> $rate,
						$votes_tab	=>	$votes,
						$avg_tab	=> $avg				
					);
					
					if($song_rating>=4) {
						$data[$like_tab] = $rating[$like_tab] + 1;						
					}
					
					$db->update($table,$data,$key_tab."='".safe_quotes($song_key)."'");		

					setcookie($cook, true, time() + 3600*24*7);
					$_COOKIE[$cook] = true;					
								
				}
				
				
			}

			
			
		}
		else {
		
			if(!isset($_COOKIE['song_rating_'.$song_key])) {
			
				$rating = $db->fast_get("songs_rating","song_key='".safe_quotes($song_key)."'");
				if($rating === false) {
						// new
					$data = array(
						"song_key"	=> $song_key,
						"song_rate"	=> $song_rating,
						"song_votes"	=>	1,
						"song_avg"	=> $song_rating
					);
					$db->insert("songs_rating",$data);
				} else {
					$song_rate = $rating['song_rate'] + $song_rating;
					$song_votes = $rating['song_votes'] + 1;
					$song_avg = round($song_rate / $song_votes,3);
					$data= array (
						"song_rate"	=> $song_rate,
						"song_votes"	=>	$song_votes,
						"song_avg"	=> $song_avg				
					);
					$db->update("songs_rating",$data,"song_key='".safe_quotes($song_key)."'");
				}
				
				if($song_rating>=4) {
					// like
					$time = @date("YW");
					$stats = $db->fast_get("songs_stats","song_key='".safe_quotes($song_key)."' AND song_time='".$time."'");
					if($stats == false ) {
						$data = array(
							"song_key"	=> $song_key,
							"song_like"	=> 1,
							"song_views"  => 1,
							"song_time"	=> $time
						);
						
						$db->insert("songs_stats",$data);
					} else {
						$data = array(
							"song_like"	=> $stats['song_like'] + 1
						);					
						$db->update("songs_stats",$data,"song_key='".safe_quotes($song_key)."' AND song_time='".$time."'");
					}
					
					$db->fast_increase("songs","song_like_all","song_key='".safe_quotes($song_key)."'");
					
				}
				
				
				setcookie("song_rating_".$song_key, true, time() + 3600*24*7);
				$_COOKIE['song_rating_'.$song_key] = true;
				
				
				
			}
			// end
		}
		
	}
	
	
	private function ext_update_artist_pic() {
		global $db,$helper,$config,$_POST;

		$key = $helper->risk("key",1);
		$url = $helper->risk("url",1);

		
		$file = md5($url).".jpg";
		// copy($url,$config['path']."/upload/artist/".$file);
		
		required_modules("resize_images");
		
		$resize = new resize($url);
		$resize -> resizeImage(170, 170, 'auto'); 
		$resize -> saveImage($config['path']."/upload/artist/".$file, 80);  
		
		$new_url = _URL_."/upload/artist/".$file;
		
		$data = array(
			"art_pic"	=> $new_url
		);
		
		$db->update("artist",$data,"art_key='".safe_quotes($key)."'");

				
	}
	
	
	private function ext_media() {
		global $helper;
		$key = $helper->fast("key",1);
		$function = $helper->fast("callback",1);
		$obj = false;
		if($obj == true) {
			$obj = false;
		} else {
			$obj = true;
		}
		$data = create_media_player($key,$function,$obj);
		echo create_json($data);
	}
	
	private function ext_test() {
		global $helper;
		echo "POST";
		print_r($_POST);
		
	}
	
	public function ext_get_report_form() {
		global $helper;
		$data = $helper->output->rtheme("report.form");
		$arr['refer'] = $_SERVER['HTTP_REFERER'];
		$arr['subject'] = isset($_GET['subject']) ? $_GET['subject'] : "";
		$data = $helper->output->rvar($data,$arr);
		$json['html'] = $data;
		echo create_json($json);
	}


    public function ext_new_image() {
    	global $helper,$config;
		$url=$helper->risk("url",1);
        $folder=$helper->risk("folder",1);
        $w=$helper->risk("width",1); // 170
        $h=$helper->risk("height",1);

		required_modules("resize_images");

		$file = md5($url).".jpg";

		$resize = new resize($url);
		$resize -> resizeImage($w, $h, 'auto');
        if(!file_exists($config['path']."/upload/".$folder)) {
           mkdir($config['path']."/upload/".$folder,0777);
        }
		$resize -> saveImage($config['path']."/upload/".$folder."/".$file, 80);

		$new_url = _URL_."/upload/".$folder."/".$file;
        
        $data['url'] = $new_url;
		echo create_json($data);
    }

	
}
?>