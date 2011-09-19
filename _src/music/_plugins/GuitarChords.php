<?php

/* Auto Update Guitar Chords for English Song only */

class PLUGINS_GuitarChords extends controllers {
	var $mute = false;
	var $required_modules = "cURL|simple_html_dom|fast_function";
	
	function index() {
		global $db,$helper;
		
		$db->connect();
		$db->set_db();
		
	
		update_cron_time("GuitarChords");
		$week = @date("YW");		
		$sql = $db->get("songs|LEFT JOIN:songs_rating:T1.song_key=T2.song_key|INNER JOIN:songs_stats:T1.song_key=T3.song_key|LEFT JOIN:artist:T1.art_key=T4.art_key|INNER JOIN:songs_lyrics:T1.song_key=T5.song_key AND T5.guitar_chord IS NULL","T1.*,T2.*,T3.*,T4.art_pic,T4.art_name,T4.art_seo,T5.*,T1.song_key AS song_key","song_status='active' ",5,"T3.song_like DESC, song_like_all DESC");	
						
					
		while($ht = $db->fetch($sql)) {
			
			$song = un_quotes($ht['song_name']);
			$song=trim(preg_replace("/\([^>]*\)/","",$song));
			
			$artist = un_quotes($ht['art_name']);
			if($this->mute == true) {
				echo " ".$song." -- ".$artist."<br>\n";	
			}
											
			// echo $html;	
			if(function_exists("mb_strtolower")) {
				$song = mb_strtolower($song);
				$artist = mb_strtolower($artist);			
			} else {
				$song = strtolower($song);
				$artist = strtolower($artist);			
			}
						
			$text = $this->ultimate_guitar($song,$artist);
			if($text=="") {
				$text = $this->guitaretab($song,$artist);
			}
			
			update_chord($ht['song_key'],$text);
		}
		
			
	}
	
	
	function song_update($key) {
	global $db,$helper;	
		$db->connect();
		$db->set_db();
	//	echo " KEY ".$key."<br>";	
		$sql = $db->get("songs|LEFT JOIN:songs_rating:T1.song_key=T2.song_key|INNER JOIN:songs_stats:T1.song_key=T3.song_key|LEFT JOIN:artist:T1.art_key=T4.art_key|INNER JOIN:songs_lyrics:T1.song_key=T5.song_key","T1.*,T2.*,T3.*,T4.art_pic,T4.art_name,T4.art_seo,T5.*,T1.song_key AS song_key","T1.song_key='".safe_quotes($key)."' ",1,"T3.song_like DESC, song_like_all DESC");	
						
					
		while($ht = $db->fetch($sql)) {
			
			$song = un_quotes($ht['song_name']);
			$song=trim(preg_replace("/\([^>]*\)/","",$song));
			
			$artist = un_quotes($ht['art_name']);
			if($this->mute == true) {
			//	echo " ".$song." -- ".$artist."<br>\n";	
			}
											
			// echo $html;	
			if(function_exists("mb_strtolower")) {
				$song = mb_strtolower($song);
				$artist = mb_strtolower($artist);			
			} else {
				$song = strtolower($song);
				$artist = strtolower($artist);			
			}
						
			$text = $this->ultimate_guitar($song,$artist);
			if($text=="") {
				$text = $this->guitaretab($song,$artist);
			}
			if($this->mute==true) {
				// echo "<pre>".$text."</pre>";
			}
			$txet=str_replace("'","",$text);
			
			update_chord($ht['song_key'],$text);
		}		
		
	}
	
	function guitaretab($song,$artist) {
		$q=urlencode($song);
		$web="http://www.guitaretab.com/fetch/?type=tab&query=".$q;	
		$cURL = new cURL();
		$html = $cURL->get($web,"http://www.guitaretab.com/");

		$ch = "";
		$lastfound = "";
		if(strpos($html,"0 results") === false ) {
			$dom=str_get_html($html);
			foreach($dom->find("li") as $li) {
				$text = strtolower($li->plaintext);
				if(strpos($text,$song) === false ) {
					// skip
				} elseif(strpos($text,$artist)=== false) {
					// skip
				} else {
					// found it
					$a=$li->find("a",1);
					$link=$a->href;
					if(strpos($link,"guitaretab.com") === false ) {
						$link="http://www.guitaretab.com".$link;
					}
					$html = $cURL->get($link,"http://www.guitaretab.com");
					$pos1 = strpos($html,"<pre");
					$pos2 = strpos($html,"</pre",$pos1);
					if($pos1 && $pos2) {
						$pos1 = $pos1 + 5;
						$html = substr($html,$pos1,$pos2 - $pos1);
						$html = strip_tags($html,"<br><span><b><strong>");												
						if(strpos($text,"chords") === false ) {						
							$lastfound = $html;
						} else {
							return $html;
						}
					}					
				}
				
				
				
			}
		}
		
		if($lastfound!="") {
			return $lastfound;
		}
		
		return $ch;
		
		
	}
	
	function ultimate_guitar($song,$artist) {
		$q=urlencode($song." ".$artist);
		$web = "http://www.ultimate-guitar.com/search.php?value=".$q."&search_type=title";
		$cURL = new cURL();
		$html = $cURL->get($web,"http://www.ultimate-guitar.com/");
		$ch = "";
		if(strpos($html,"no results") === false ) {
			$dom = str_get_html($html);
			$table = $dom->find("table[class='tresults']",0);
			foreach($table->find("tr") as $tr) {
				$a = $tr->find("a",1);
				$s = $tr->find("a",2);
				if((isset($a))&&(isset($s))) {	
													
					$link = $s->href;
					$a = $a->plaintext;
					$s = $s->plaintext;
					
					if(function_exists("mb_strtolower")) {
						$s = mb_strtolower($s);
						$a = mb_strtolower($a);			
					} else {
						$s = strtolower($s);
						$a = strtolower($a);			
					}
					if(($song == $s)&&($a == $artist)) {
						// work here
						$html = $cURL->get($link,"http://www.ultimate-guitar.com/");
//						$dom = str_get_html($html);
						$pos1 = strpos($html,"<pre");						
						$pos2 = strpos($html ,"<span",$pos1);
						$pos3 = strpos($html,"</pre",$pos2 );
						$pre= substr($html,$pos2,$pos3-$pos2); 
				//		$pre=preg_replace("/<\/span>[a-zA-Z0-9\.\?\'\"\!\@\&\s\(\)\[\]\-\_\+\=]{8}\s+/","<br></span>$1$2",$pre);
				//		$pre=str_replace("\n","<br>",$pre);
						$ch = $pre;				
						return $ch;												
						
					}
					
				}
				
			}
		}
		
		return $ch;
		
	}
	
	
}

?>