<?php

class Tartist extends templates {
	var $themetemplate = "global";
	var $artist = 0;
	function main_body() {
		global $db,$helper;
		
		$act = action(1);
		$page = $helper->get_current_page();
		
		if($act!="") {
			$ex = explode("-",$act);
			$key = safe_quotes($ex[0]);
			
			$artist = $db->fast_get("artist","art_key='".$key."'");
			$this->artist = $artist;
			
			if(($page == 1)&&($artist['art_bio']!="")) {
				$this->show_artist_info();
			}
			
			$this->show_artist_song();
		}
	}
	
	function show_artist_info() {
		$tmp = $this->rtheme("artist.info");
		echo $this->rvar($tmp,$this->artist);
	}
	
	function show_artist_song() {
		global $db,$_GET,$config,$helper;
		

		$limit = $config['page']['song'];				
		$page = $helper->get_current_page($limit);		
		
		$sql = $db->get("songs|LEFT JOIN:songs_rating:T1.song_key=T2.song_key|LEFT JOIN:artist:T1.art_key=T3.art_key","T1.*,T2.*,T3.art_pic,T3.art_name,T3.art_seo,T1.song_key AS song_key","song_artist LIKE '%[".$this->artist['art_name']."]%' and (song_status='active') ",$page,"song_like_all DESC, T1.song_key DESC");		
		
		$data['page_nav']  = $helper->get_page_nav($db->table,"T1.song_key",$db->where,$limit);
													
		$html = listsong($sql,$data['page_nav']);								  
			  
		echo $html;
	}
}

?>