<?php

class Ttopsongs extends templates {
	var $themetemplate = "global";
	
	function main_body() {
		$data['topsongs'] = $this->topsongs();
		
		$tmp = $this->rtheme("topsongs.main");
		
		$html = $this->rvar($tmp,$data);
		
		echo $html;
		
	}
	
	function topsongs() {
		global $db,$helper,$config;
	
		$limit = 100;				
    	$page = $helper->get_current_page($limit);
		$week = @date("YW");		
		$sql = $db->get("songs|LEFT JOIN:songs_rating:T1.song_key=T2.song_key|INNER JOIN:songs_stats:T1.song_key=T3.song_key|LEFT JOIN:artist:T1.art_key=T4.art_key","T1.*,T2.*,T3.*,T4.art_pic,T4.art_name,T4.art_seo,T1.song_key AS song_key","song_status='active' AND T3.song_time='".$week."' ",$page,"T3.song_like DESC, song_like_all DESC");				
		$data['page_nav']  = "";				
		$html = listsong($sql,false);
		

  
		return $html;		
	}		
	
}
?>