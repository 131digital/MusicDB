<?php

class Cmyplaylist extends controllers {
	var $login = "db_login";
	function index() {
	}
	
	function ajax_addsong_tolist() {
		global $db,$helper;
		$song_key = $helper->risk("song_key",1,"number");
		$playlist_key = $helper->risk("playlist_key",1,"number");
		if(($song_key!="")&&($playlist_key!="")) {
			$u = $db->fast_get("links_playlist_songs","song_key='".$song_key."' AND playlist_key='".$playlist_key."'");
			if($u == false) {
				$data = array(
					"song_key"	=> $song_key,
					"playlist_key"	=> $playlist_key 
				);
				$db->insert("links_playlist_songs", $data);
			}
			$json['result'] = 'ok';
		}
		echo create_json($json);
	}
	
	function ajax_quickdelete() {
		global $db,$helper;
		$song_key = $helper->risk("song_key",1,"number");
		$playlist_key = $helper->risk("playlist_key",1,"number");	
		if(($song_key!="") && ($playlist_key!="")) {
			$db->delete("links_playlist_songs","song_key='".$song_key."' AND playlist_key='".$playlist_key."'",1);
		}
	}
	
	function ajax_edit() {
		global $db,$helper;
		$helper->error = "";
		$name = $helper->fast("playlist_name",3,"",xlang("Playlist Name"));
		$pic = $helper->fast("playlist_pic",0,"/http\:\/\/[a-z0-9A-Z]+\.photobucket\.com\/(.*)/",xlang("Playlist PIcture"));
		$sharing = $helper->fast("playlist_sharing",1);
		$playlist_key = $helper->risk("playlist_key",1,"number");
		$user_key	= $this->user_info['user_key'];
		
		if($helper->error!="") {
			$json['result'] = 'error';
			$json['text']	= $helper->error;
			$json['title']	= xlang("Playlist");
		} else {
			$json['result']	= 'ok';
			$json['text']	= xlang("Updated Playlist");
			$json['title']	= xlang("Playlist");
			$data = array(																																																			
				"playlist_name"	=> $name,
				"playlist_sharing"	=>	$sharing,			
				"playlist_pic"	=> $pic		
			);
			$db->update("playlist",$data,"playlist_key='".$playlist_key."' AND user_key='".$user_key."'");						
		}
		
		echo create_json($json);
	}	

	
	function ajax_addnew() {
		global $db,$helper;
		$helper->error = "";
		$name = $helper->fast("playlist_name",3,"",xlang("Playlist Name"));
		$pic = $helper->fast("playlist_pic",0,"/http\:\/\/[a-z0-9A-Z]+\.photobucket\.com\/(.*)/",xlang("Playlist PIcture"));
		$sharing = $helper->fast("playlist_sharing",1);
		
		if($helper->error!="") {
			$json['result'] = 'error';
			$json['text']	= $helper->error;
			$json['title']	= xlang("Playlist");
		} else {
			$json['result']	= 'ok';
			$json['text']	= xlang("Created New Playlist");
			$json['title']	= xlang("Playlist");
			$data = array(																																																			
				"playlist_name"	=> $name,
				"playlist_sharing"	=>	$sharing,
				"user_key"	=> $this->user_info['user_key'],
				"playlist_views"	=> 0,
				"playlist_like"	=> 0,
				"playlist_votes"	=>	0,
				"playlist_avg"	=>	0,
				"playlist_rate"	=> 0,
				"playlist_pic"	=> $pic		
			);
			$db->insert("playlist",$data);
			if(isset($_POST['ajax'])) {
				$u = $db->fast_get("playlist",1,"playlist_key DESC");
				$json = array_merge($json,$u);
			}
		}
		
		echo create_json($json);
	}
	
	function ajax_get_mylist() {
		global $db;
		$user_key = $this->user_info['user_key'];
		$sql = $db->get("playlist","playlist_key,playlist_name","user_key='".$user_key."'");
		$user = array();
		while($ht = $db->fetch($sql)) {
			array_push($user,$ht);
		}
		echo create_json($user);
	}
}

?>