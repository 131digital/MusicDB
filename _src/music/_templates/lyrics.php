<?php
class Tlyrics extends templates {
	var $themetemplate = "global";
	
	function main_body() {
		global $db,$helper,$_SERVER,$class;
		
		$act  = explode("-",action(1),2);
		$key=$act[0];
		
		$ht = $db->fast_get("songs|songs_lyrics:T1.song_key=T2.song_key|LEFT JOIN:songs_rating:T1.song_key=T3.song_key|INNER JOIN:artist:T1.art_key=T4.art_key","T1.song_key='".safe_quotes($key)."' AND T1.song_status='active'","","*, T1.song_key AS song_key, T1.art_key as art_key");
		if($ht == false) {
			// no song
			exit;
		}
				
				
		if(($ht['lyric_text']=="")&&($ht['guitar_chord']!="")) {
			$ht['lyric_text'] = $ht['guitar_chord'];
		}
		if($ht['lyric_text']=="") {
			$ht['lyric_text']=xlang("No Lyrics");
		}
		
		if($ht['guitar_chord']=="") {
			$ht['guitar_chord']=xlang("No Chord");
		}
		
		$ht['buy_mp3'] = $ht['song_name']." ".clean_artist($ht['song_artist']);
		$ht['buy_mp3'] = str_replace("'","\\'",$ht['buy_mp3']);
		
		$ht['more_song'] = $this->more_song();
		
		$ht['artist_song'] = $this->artist_song($ht['art_key']);
		
		
		$ht['current_url'] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];	
				
		
		$tmp = $this->rtheme("lyrics.info");
		
		$html = $this->rvar($tmp,$ht);
		
		echo $html;
		
		
	}
	
	function more_song() {
	global $db,$helper,$config;
	
		$limit = 5;				
    	$page = $helper->get_current_page($limit);
		$week = @date("YW");		
		$sql = $db->get("songs|LEFT JOIN:songs_rating:T1.song_key=T2.song_key|INNER JOIN:songs_stats:T1.song_key=T3.song_key|LEFT JOIN:artist:T1.art_key=T4.art_key","T1.*,T2.*,T3.*,T4.art_pic,T4.art_name,T4.art_seo,T1.song_key AS song_key","song_status='active' AND T3.song_time='".$week."' ",$page,"RAND()");				
		$data['page_nav']  = "";				
		$html = listsong($sql,false);		
  
		return $html;				
	}
	
	function artist_song($art_key) {
	global $db,$helper,$config;
	
		$limit = 5;				
    	$page = $helper->get_current_page($limit);
		$week = @date("YW");		
		$sql = $db->get("songs|LEFT JOIN:songs_rating:T1.song_key=T2.song_key|INNER JOIN:songs_stats:T1.song_key=T3.song_key|INNER JOIN:artist:T1.art_key=T4.art_key AND T4.art_key='".$art_key."'","T1.*,T2.*,T3.*,T4.art_pic,T4.art_name,T4.art_seo,T1.song_key AS song_key","song_status='active' ",$page,"RAND()");				
		$data['page_nav']  = "";				
		$html = listsong($sql,false);		
  
		return $html;			
	}
}
?>