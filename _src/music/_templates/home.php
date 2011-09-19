<?php
class Thome extends templates {
	var $themetemplate = "global";
	
	function main_body() {
		
		$tmp = $this->rtheme("home");
		
		$data['popular_song'] = $this->popular_song();
		$data['popular_artist']	= $this->popular_artist();
		$data['slider_nivo'] = $this->slide_nivo();
		
		echo $this->rvar($tmp,$data);
	}
	
	
	function popular_song() {
		global $db,$helper,$config;

			
		$limit = 10;				
    	$page = $helper->get_current_page($limit);
		$week = @date("YW");		
						
		$sql = $db->get("songs|LEFT JOIN:songs_rating:T1.song_key=T2.song_key|INNER JOIN:songs_stats:T1.song_key=T3.song_key|LEFT JOIN:artist:T1.art_key=T4.art_key","T1.*,T2.*,T3.*,T4.art_pic,T4.art_name,T4.art_seo,T1.song_key AS song_key","song_status='active' AND T3.song_time='".@date("YW")."' ",rand(15,90).",10","song_like DESC");						
		$html = listsong($sql,false);								  
		return $html;		
	}
	
	function popular_artist() {
		global $db,$helper,$config;
		
		$limit = 7;
		$page = $helper->get_current_page($limit);
		$art_tmp = $this->rtheme("home.artist");
		$sql = $db->get("artist","*","art_pic <> ''",$page,"RAND()");
		$html = "";
		while($art = $db->fetch($sql)) {			
			$art['song_data'] = $this->get_song_of_artist($art['art_key']);
			$html.=$this->rvar($art_tmp,$art);
		}
		
		return $html;
		
		
	}
	
	function get_song_of_artist($art_key) {
		global $db,$helper,$config;			
		$limit = 5;				
    	$page = $helper->get_current_page($limit);
		$week = @date("YW");									
		$sql = $db->get("songs|LEFT JOIN:songs_rating:T1.song_key=T2.song_key|INNER JOIN:songs_stats:T1.song_key=T3.song_key|INNER JOIN:artist:T1.art_key=T4.art_key AND T1.art_key=".$art_key."","T1.*,T2.*,T3.*,T4.art_pic,T4.art_name,T4.art_seo,T1.song_key AS song_key","song_status='active'   ",$page,"song_like DESC, song_like_all DESC");						
		$html = listsong($sql,false,3,22);								  
		return $html;			
	}
	
	function slide_nivo() {
		$html="";
		for($i=0;$i<=8;$i++) {
			$d = @date("M-d-Y",strtotime("-$i days"));
			$html.="<img src='"._URL_."/upload/365pro/463/".$d."_463.jpg' alt='Bible Promises ".@date("M d Y",strtotime("-$i days"))."' width=463 height=233  />";
		}
		return $html;
		
	}
	
}
?>