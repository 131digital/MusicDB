<?

class Tsearch extends templates {
	var $themetemplate = "global";
	function main_body() {
		global $db,$helper;
		
		$kw = action(1);
		
		$tmp = $this->rtheme("search.main");	
		$ht['results_songs'] = $this->search_songs($kw);		
		echo $this->rvar($tmp,$ht);
		
	}
	
	function search_songs($kw) {
		global $db,$_GET,$config,$helper;		
		$limit = 40;				
		$kw=urldecode($kw);
		$page = $helper->get_current_page($limit);		
		
		$sql = $db->get("songs|LEFT JOIN:songs_rating:T1.song_key=T2.song_key|LEFT JOIN:artist:T1.art_key=T3.art_key","T1.*,T2.*,T3.art_pic,T3.art_name,T3.art_seo,T1.song_key AS song_key","(song_name LIKE '%".safe_quotes($kw)."%' OR song_artist LIKE '%".safe_quotes($kw)."%') and (song_status='active') ",$page,"song_like_all DESC, T1.song_key DESC");	
		
		$total = $db->get_total($db->table,"T1.song_key",$db->where);
				
		$data['page_nav']  = $helper->get_page_nav($db->table,"T1.song_key",$db->where,$limit);
													
		$html = listsong($sql,$data['page_nav']);								  
			  
		return $html;
		
	}
}
?>