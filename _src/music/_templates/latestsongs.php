<?php

class Tlatestsongs extends templates {
	var $themetemplate = "global";
	
	function main_body() {
		$data['latestsongs'] = $this->latest();
		
		$tmp = $this->rtheme("latestsongs.main");
		
		$html = $this->rvar($tmp,$data);
		
		echo $html;
		
	}
	
	function latest() {
		global $db,$helper,$config;	
		$limit = $config['page']['song'];						
    	$page = $helper->get_current_page($limit);	
		$sql = $db->get("songs|LEFT JOIN:songs_rating:T1.song_key=T2.song_key|INNER JOIN:songs_stats:T1.song_key=T3.song_key|LEFT JOIN:artist:T1.art_key=T4.art_key","T1.*,T2.*,T3.*,T4.art_pic,T4.art_name,T4.art_seo,T1.song_key AS song_key","song_status='active'  ",$page,"T1.song_key DESC");				
		$data['page_nav']  = $helper->get_page_nav($db->table,"T1.song_key",$db->where,$limit);;				
		$html = listsong($sql,$data['page_nav']);
		

  
		return $html;		
	}			
}

?>