<?php
/* Auto Update Lyrics / English Songs Only */

class PLUGINS_elyrics extends controllers {
	var $mute = false;
	var $required_modules = "fast_function|cURL|simple_html_dom";
	
	function index() {
		global $db,$helper;		
		
		$db->connect();
		$db->set_db();
		
	
		update_cron_time("elyrics");
		$week = @date("YW");		
		$sql = $db->get("songs|LEFT JOIN:songs_rating:T1.song_key=T2.song_key|INNER JOIN:songs_stats:T1.song_key=T3.song_key|LEFT JOIN:artist:T1.art_key=T4.art_key|INNER JOIN:songs_lyrics:T1.song_key=T5.song_key AND T5.lyric_text IS NULL","T1.*,T2.*,T3.*,T4.art_pic,T4.art_name,T4.art_seo,T5.*,T1.song_key AS song_key","song_status='active' ",5,"T3.song_like DESC, song_like_all DESC");	
						
					
		while($ht = $db->fetch($sql)) {
		
			$song = un_quotes($ht['song_name']);
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
					
			$text = $this->elyric($song,$artist);
			if($text == "" ) {
				$text = $this->metrolyrics($song,$artist);
			}
			if($text == "") {
				$text = $this->azlyric($song,$artist);
			}
			if($text=="")  {
				if($this->mute == true) {
					echo " NOT FOUND <br>\n";
				}	
			}
			
			update_lyrics($ht['song_key'],$text);
			
			
			
		} // end while
		
		
								
		
	}
	
	
	function for_song($key) {
		global $db,$helper;
		$db->connect();
		$db->set_db();
			

		$week = @date("YW");		
		$sql = $db->get("songs|LEFT JOIN:songs_rating:T1.song_key=T2.song_key|INNER JOIN:songs_stats:T1.song_key=T3.song_key|LEFT JOIN:artist:T1.art_key=T4.art_key|INNER JOIN:songs_lyrics:T1.song_key=T5.song_key AND T5.lyric_text IS NULL","T1.*,T2.*,T3.*,T4.art_pic,T4.art_name,T4.art_seo,T5.*,T1.song_key AS song_key","T1.song_key='".safe_quotes($key)."' ",1,"T3.song_like DESC, song_like_all DESC");	
						
					
		while($ht = $db->fetch($sql)) {
		
			$song = un_quotes($ht['song_name']);
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
					
			$text = $this->elyric($song,$artist);
			if($text == "" ) {
				$text = $this->metrolyrics($song,$artist);
			}
			if($text == "") {
				$text = $this->azlyric($song,$artist);
			}
			if($text == "")  {
				if($this->mute == true) {
					echo " NOT FOUND <br>\n";
				}	
			} else {
			}
			
			update_lyrics($ht['song_key'],$text);
			
			
			
		} // end while		

				
						
	}
	
	function azlyric($song,$artist) {
		$cURL = new cURL();
		$q = str_replace(' ','+',$song." ".$artist);				
		$web="http://search.azlyrics.com/search.php?q=".$q;
		$html = $cURL->get($web,"http:/www.azlyrics.com");
		$lyric = "";
		if(strpos($html,"no results") === false) {
			$dom = str_get_html($html);
			foreach($dom->find("a[href^='http://www.azlyrics.com/lyrics/']") as $a) {
				$text = strtolower(trim($a->plaintext));
				if(strpos($text,$song) === false ) {
					// skip
				} elseif(strpos($text,$artist) === false ) {
					// skip
				} else {
					// get it
					$link = $a->href;
					$html = $cURL->get($link,"http://www.azlyrics.com");
					$pos1 = strpos($html,"start of lyrics");
					$pos2 = strpos($html,"end of lyrics",$pos1);
					if(($pos1>0) && ($pos2>0)) {
						$start = $pos1 + strlen("start of lyrics") + 5;
						$end = $pos2 - 6;
						$lyric = substr($html,$start,$end - $start);
						return $lyric;
					}
				}
			}
		}
		
		return $lyric;
		
	}
	
	function metrolyrics($song,$artist) {
		$cURL = new cURL();
		$q = str_replace(' ','+',$song." ".$artist);
		$web = "http://www.metrolyrics.com/search.php?category=artisttitle&search=".$q;
		// echo "Web: ".$web."<br>";
		$html = $cURL->get($web,"http://www.metrolyrics.com");
		$dom = str_get_html($html);
		$lyric = "";
		foreach($dom->find("ul[id='results'] li") as $li) {
			$a = $li->find("a",1);
			$s = $li->find("a",2);
			$link = $s->href;
			
			$a = strtolower(trim($a->plaintext));
			$s = strtolower(trim($s->plaintext));
			
			if(strpos($a,$artist) === false) {
				// skip
			} elseif(strpos($s,$song) === false) {
				// skip
			} else {
				// do something
				if(strpos($link,"metrolyrics.com") === false ){
					$link = "http://www.metrolyrics.com".$link;
				}

				$html = $cURL->get($link,"http://www.metrolyrics.com");
				if(strpos($html,'have the lyrics') === false ) {

					$dom = str_get_html($html);
					$lyric = $dom->find("div[id=lyrics]",0);						
					$lyric = $lyric->innertext;
					$lyric = strip_tags($lyric,"<br><b><strong><span>");
					$ex = explode("</span>",$lyric);
					$lyric = "";
					foreach($ex as $line) {
						if(strpos($line,"metrolyrics.com") === false) {
							$lyric .= $line." </span>";
						}
					}
					$lyric = str_replace("</span>","</span><br>",$lyric);
					$lyric = strip_tags($lyric,"<br><strong>");
					return $lyric;
				}
			}
						
		}
		
		return $lyric;
		
	}
	
	function elyric($song,$artist) {
		global $helper;
			$cURL = new cURL();
			$q = $song." ".$artist;
			$html = $cURL->post("http://www.elyrics.net/find.php","s=2&q=".$q,"http://www.elyrics.net");				
			$html =  str_get_html($html);
			$ly = "";
			foreach($html->find('a[href$="-lyrics.html"]') as $a) {
				$text =  strtolower($a->plaintext);
				$link = $a->href;
				if(strpos($text,$song) === false) {
					// skip
				} else {
					if(strpos($text,$artist) === false ) {
						// skip
					} else {
						// found													
						if(strpos($link,"elyrics.net") === false ) {
							$link="http://www.elyrics.net".$link;
						}
						$src = $link;
						$tmp = $cURL->get($src);
						
						// $tmp = strip_tags($tmp,"<br><div>");			
						$tmp = str_get_html($tmp);
						$lyric = $tmp->find("div[class='ly']",0);
						$lyric = $lyric->innertext;										
						$lyric = explode("<br>",$lyric);
						
						foreach($lyric as $line) {
							if(strpos($line,"elyrics.net") == false) {
								$ly.=$line." <br> ";
							}
						}
						
						// $text
						return $ly;
					
						
					}
				}
			} // end foreach	
			
			return $ly;	
	}
}
?>