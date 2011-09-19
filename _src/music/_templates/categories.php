<?

class Tcategories extends templates {
	var $themetemplate = "global";
	function main_body() {
		global $db,$helper;
		
		$cat = action(1);
		$ex = explode("-",$cat);
		$cat=$ex[0];
		
		$tmp = $this->rtheme("categories.main");	
		$ht['category_songs'] = $this->cat_songs($cat);		
		echo $this->rvar($tmp,$ht);
		
	}
	
	function cat_songs($cat) {
		global $db,$_GET,$config,$helper;		
		$limit = 40;				
		$page = $helper->get_current_page($limit);		
		$s = "SELECT T1.song_key,T1.song_artist,T1.song_name,T1.song_seo,T2.song_rate,T2.song_votes,T2.song_avg,T3.art_pic,T3.art_name,T3.art_seo,T1.art_key as art_key FROM(
					SELECT S.* FROM msc_links_cats_songs CS
							 INNER JOIN msc_songs S ON S.song_key = CS.song_key AND S.song_status='active'
					WHERE CS.cat_key = ".$cat."
					UNION ALL
					SELECT S.* FROM msc_links_cats_artist CA
							 INNER JOIN msc_songs S ON S.art_key = CA.art_key AND S.song_status='active'
					WHERE CA.cat_key = ".$cat."
				) AS T1
				LEFT JOIN msc_songs_rating T2 ON T1.song_key = T2.song_key 
				LEFT JOIN msc_artist T3 ON T1.art_key = T3.art_key  				 
				ORDER BY RAND()
				LIMIT ".$page."
			";				
		$sql = $db->query($s,"song_key");
		
		$data['page_nav']  = $helper->get_page_nav("","","",$limit,"",$db->total);
													
		$html = listsong($sql,$data['page_nav']);								  
			  
		return $html;
		
	}
}
?>