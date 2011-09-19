<?php

class Tplaylist extends templates {
	var $themetemplate = "global";
	
	function main_body() {
		global $db,$helper;
		
		$act = explode("-",action(1),2);
		$key = $act[0];
		
		$playlist = $db->fast_get("playlist|users:T1.user_key=T2.user_key","playlist_key='".safe_quotes($key)."'","","*,T1.playlist_key as playlist_key");
		
		if($playlist == false){
			change_location("home");
			exit;
		}
		
		
		$user_key = isset($helper->data['id']) ? $helper->data['id'] : "";
		
		if(($playlist['playlist_sharing']=='no')&&($playlist['user_key']!=$user_key)) {
			change_location("home");
			exit;						
		}
		
		$playlist['song_data'] = $this->get_songs($key);
		
		if($playlist['playlist_pic'] == '') {
			
			$playlist['playlist_pic'] = themes("img/youth.jpg");
		}
		
		$playlist['creator'] = $playlist['user_fname']." ".$playlist['user_lname'];
		$playlist['CURL'] = _URL_.$_SERVER['REQUEST_URI'];
		

		
		$main = $this->rtheme("playlist.main");
		$html = $this->rvar($main,$playlist);
		
		echo $html;
	}
	
	private function get_songs($pl_key) {
	
		global $db,$_GET,$config,$helper;
		
	
				
		$sql = $db->get("links_playlist_songs|INNER JOIN:songs:T1.song_key=T2.song_key|LEFT JOIN:songs_rating:T1.song_key=T3.song_key|LEFT JOIN:artist:T2.art_key=T4.art_key","T1.*,T2.*,T3.*,T4.art_name,T4.art_pic,T4.art_seo,T1.song_key AS song_key","playlist_key='".safe_quotes($pl_key)."' and (song_status='active') ","","songpl_order DESC, song_like_all DESC");
		
		
		$html = listsong($sql,false);

  
		return $html;
	
	}
	
}

?>