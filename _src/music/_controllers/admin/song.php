<?php

class Cadmin_song extends controllers {
	var $login = "simple_login";
	public function index() {
		
	}
	
	public function ajax_youtube() {
		global $_GET,$helper;
		
		required_modules("fast_function");
		
		if((isset($_GET['name']))&&(isset($_GET['artist']))) {
			$name = str_replace("'",'',$helper->fast("name","3"));
			$artist = str_replace("'",'',$helper->fast("artist","3"));
			
			if(($name!="") && ($artist!="")) {
				
				$youtube = fast_youtube($name,$artist);
				
				if($youtube == false ) {
					$json['result'] = 'error';
					$json['text']	= 'no data found';
					$json['title']	= 'data error';
				} else {
					$json['result']	= 'ok';
					$json['text']	=  $youtube;
					$json['title']	= 'data found';
				}	
					
			} else {
					$json['result'] = 'error';
					$json['text']	= 'var required';
					$json['title']	= 'data error';		
			}
			
			echo create_json($json);
			
			exit;
		
		}
		
	}
	
	public function ajax_delete() {
		global $_POST,$lang,$helper,$db;
		$helper->error = "";
		$key = $helper->risk('key',1, "number");
		
		$sql = $db->delete("songs","`song_key` = '".$key."'",1);
		$sql = $db->delete("songs_lyrics","`song_key` = '".$key."'");		
		$sql = $db->delete("songs_rating","`song_key` = '".$key."'");
		$sql = $db->delete("songs_stats","`song_key` = '".$key."'");
		$sql = $db->delete("links_cats_songs","`song_key` = '".$key."'");								
		
		$json['text'] = xlang("removed_data");
		$json['result'] = 'ok';
		$json['title'] = "Completed";
		
		echo create_json($json);		
	}
	

	public function ajax_edit() {
		global $db,$config,$_POST,$helper;
		
		$helper->error = "";
		$song_key = $helper->risk("r",1,"number");
		

		$song_name = $helper->fast("song_name",3,"",xlang("Song Name"));
		$song_seo  = $helper->fast("song_seo",3,"",xlang("Song SEO"));
		
		$song_like_all = $helper->fast("song_like_all",1,"number",xlang("Song Like Number"));
		$song_views_all  = $helper->fast("song_views_all",1,"number",xlang("Song Views Number"));		

		$song_url = $helper->fast("song_url");
		
		$song_youtube = $helper->fast("song_youtube");		
		$song_artist = trim($helper->fast("song_artist"));
		if(substr($song_artist,strlen($song_artist) - 1) == ",") {
			$song_artist = substr($song_artist,0,strlen($song_artist) -1 );
		}
		
		
		if($song_artist!="") {
			$art_name = $this->get_first_artist($song_artist);
			$art = $db->fast_get("artist","art_name='".safe_quotes($art_name)."'");
			$art_key = isset($art['art_key']) ? $art['art_key'] : 0;
		} else {
			$art_key=0;
		}		
		
		$song_tags = $helper->fast("song_tags");
		$song_status = $helper->fast("song_status",1,"",xlang("Song Status"));
		
		$song_lyric = $helper->fast("song_lyric");
		$song_guitar = $helper->fast("song_guitar");
		
						
		
		if($helper->error == "" ){
			$data = array(
				"song_name" => $song_name,
				"song_seo" 	=> $song_seo,
				"song_youtube"	=> $song_youtube,
				"song_artist"	=>	$song_artist,
				"art_key"		=> $art_key,
				"song_tags"		=> $song_tags,
				"song_status"	=> $song_status,
				"song_url"		=> $song_url,				
				"song_like_all"	=> $song_like_all,
				"song_views_all"	=> $song_views_all,
				"song_broken"	=> "__ NULL"			
			);
			
			$sql = $db->update("songs",$data, "song_key='".$song_key."'",1);	
			
			
			$cat = "";
			if(isset($_POST['song_cat'])) {
				$db->delete("links_cats_songs", "song_key='".$song_key."'");
				$song_cat = $_POST['song_cat'];			
				foreach($song_cat as $scat) {
					$data = array(
						'cat_key' =>$scat,
						'song_key'	=> $song_key
					);
					$db->insert("links_cats_songs",$data);
					
				}
			}	
																				
					
			$data = array();		
			if($song_lyric == "") {
					$song_lyric = "__ NULL";
			}
			if($song_guitar == "") {
					$song_guitar = "__ NULL";
			}
			
			$data = array(
				"song_key" => $song_key,
				"lyric_text"	=> $song_lyric,
				"guitar_chord"	=> $song_guitar
			);						

			$sql = $db->update("songs_lyrics", $data ,"song_key='".$song_key."'",1);									
			
		}
		
		if($helper->error == "" ){
			$json['result'] = 'ok';
			$json['text']	= "Updated Song: ".$song_name."";
			$json['title']	= "Completed Request";
		} else {
			$json['result'] = 'error';
			$json['text']	= "Please check again: ".$helper->error;
			$json['title']	= "Request Error";			
		}
		
		echo create_json($json);
		
		
	}
		
	
	public function ajax_addnew() {
		global $db,$config,$_POST,$helper;
		
		$helper->error = "";

		$song_name = $helper->fast("song_name",3,"",xlang("Song Name"));
		$song_seo  = $helper->fast("song_seo",3,"",xlang("Song SEO"));

		$song_url = $helper->fast("song_url");
		
		$song_youtube = $helper->fast("song_youtube");

		
		$song_artist = trim($helper->fast("song_artist"));
		if(substr($song_artist,strlen($song_artist) - 1) == ",") {
			$song_artist = substr($song_artist,0,strlen($song_artist) -1 );
		}		
		
		if($song_artist!="") {
			$art_name = $this->get_first_artist($song_artist);
			$art = $db->fast_get("artist","art_name='".safe_quotes($art_name)."'");
			$art_key = isset($art['art_key']) ? $art['art_key'] : 0;
		} else {
			$art_key=0;
		}
		
		$song_tags = $helper->fast("song_tags");
		$song_status = $helper->fast("song_status",1,"",xlang("Song Status"));
		
		$song_lyric = $helper->fast("song_lyric");
		$song_guitar = $helper->fast("song_guitar");
		

		
				
		$duplicated1 = array(
			"song_youtube"	=> $song_youtube
		);
		
		if($song_artist!="") {			
			$duplicated2 = array(
				"song_name"	=> $song_name,
				"song_artist"	=> $song_artist
			);	
			
			if( $helper->is_duplicated("songs",$duplicated2) == true ) {
				$helper->make_error(xlang("You have this song in database already!"));
			}				
		}
		
		if( $helper->is_duplicated("songs",$duplicated1) == true ) {
			$helper->make_error(xlang("You have this song in database already!"));
		}	
		
		
		if($helper->error == "" ){
			$data = array(
				"song_name" => $song_name,
				"song_seo" 	=> $song_seo,
				"song_youtube"	=> $song_youtube,
				"song_artist"	=>	$song_artist,
				"art_key"		=> $art_key,
				"song_tags"		=> $song_tags,
				"song_status"	=> $song_status,
				"song_url"		=> $song_url					
			);
			
			$sql = $db->insert("songs",$data);										
			$ht = $db->fast_get("songs","","song_key DESC");
									
			$song_key = $ht['song_key'];
		
			$db->delete("links_cats_songs", "song_key='".$song_key."'");
			$cat = "";
			if(isset($_POST['song_cat'])) {
				$song_cat = $_POST['song_cat'];			
				foreach($song_cat as $scat) {
					$data = array(
						'cat_key' =>$scat,
						'song_key'	=> $song_key
					);
					$db->insert("links_cats_songs",$data);
					
				}
			}			
						
			$data = array();		
			if($song_lyric == "") {
					$song_lyric = "__ NULL";
			}
			if($song_guitar == "") {
					$song_guitar = "__ NULL";
			}
			
			$data = array(
				"song_key" => $song_key,
				"lyric_text"	=> $song_lyric,
				"guitar_chord"	=> $song_guitar
			);						
			
			$sql = $db->insert("songs_lyrics", $data);		
			
										
			
		}
		
		if($helper->error == "" ){
			$json['result'] = 'ok';
			$json['text']	= "Added New Song: ".$song_name." into database";
			$json['title']	= "Completed Request";
		} else {
			$json['result'] = 'error';
			$json['text']	= "Please check again: ".$helper->error;
			$json['title']	= "Request Error";			
		}
		
		echo create_json($json);
		
		
	}
	
	function get_first_artist($list) {
		$ex = explode(",",$list);
		$name = trim($ex[0]);
		return $name;
	}
}		
		
		
?>