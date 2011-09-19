<?php

function super_trim($name) {
	if(function_exists("mb_eregi_replace")) {	
		// $name = mb_eregi_replace("/\s[\s]+/"," ",$name);	
		 $name = preg_replace("/\s[\s]+/"," ",$name);	
	} else {
		 $name = preg_replace("/\s[\s]+/"," ",$name);			
	}
	$name = trim($name);
	return $name;	
}

function new_artist($artist,$echo = false) {
	global $db,$helper;

	$artist=super_trim(super_replace($artist));
	if($artist	!= "") {
		$ht =  $db->fast_get("artist","art_name='".safe_quotes($artist)."'");
		if($ht == false) {
			// insert new artist
			$data = array(
				"art_name"	=> $artist,
				"art_seo"	=> ini_seo($artist),
				"art_youtube"	=>	"http://www.youtube.com/artist/".str_replace(' ','_',$artist),
				"art_auto_update"	=> "yes",
				"art_last_update"	=> "__ NULL",
				"art_status"		=> "active"					
			);
			
			$db->insert("artist",$data);	
			if($echo == true ) {
				echo "Added New Artist : ".$artist."<br>\n";
			}
			$ht =  $db->fast_get("artist","art_name='".safe_quotes($artist)."'");
		}
		return $ht['art_key'];
   } 
   return false;
}

function new_song($songname,$artist, $echo = false) {
 	 global $db,$helper;			 
	 $songname = super_trim(super_replace($songname));
	 $artist  = super_trim(super_replace($artist));
     $art_key = new_artist($artist);
	 
	 if(($songname!='')&&($artist!='')) {
		 $ht = $db->fast_get("songs","`song_name`='".safe_quotes($songname)."' AND `song_artist` LIKE '".safe_quotes($artist)."%'");
		 if($ht == false) {
			// insert new song
			$art = $db->fast_get("artist","art_name='".safe_quotes($artist)."'");
			$art_key = isset($art['art_key']) ? $art['art_key'] : 0;
			
			$data = array(
				"song_name"	=> $songname,
				"song_seo"	=> ini_seo($songname),
				"song_artist"	=> "".$artist."",
				"art_key"	=> $art_key,
				"song_tags"	=>	$songname.", ".$artist,
				"song_status"	=> "waiting"
			);
			$db->insert("songs",$data);
			$tmp = $db->fast_get("songs","","song_key DESC");
			$song_key = $tmp['song_key'];
			
			$data = array(
				"song_key"	=> $song_key
			);
			$db->insert("songs_lyrics",$data);
			if($echo == true) {
				echo "Added New Song: ".$songname." -> Key ".$song_key." -> Artist: ".$artist." <br>\n";
			}
		    $ht = $db->fast_get("songs","`song_name`='".safe_quotes($songname)."' AND `song_artist` LIKE '".safe_quotes($artist)."%'");
		}
		return $ht['song_key'];
	  } 
	  return false;
				
}


function get_song_from_collection_id($id) {
    required_modules("simple_html_dom");
    $html = file_get_contents("http://itunes.apple.com/lookup?id=".$id);
    $json = json_decode($html,false);
    if($json->resultCount>=1) {
       $data['pic'] = $json->results[0]->artworkUrl100;
       $data['url'] = $json->results[0]->collectionViewUrl;
       $html = file_get_contents($data['url']);
       $html = str_get_html($html);
       $div = $html->find("div[metrics-loc='TrackList']",0);
       $data['song'] = array();
       $dem=1;
       foreach($div->find("tr[preview-title]") as $tr) {
           $track = $tr->find("td",0); $track = $track->plaintext;
           $song = $tr->find("td",1); $song = super_trim(super_replace($song->plaintext));
           $artist = $tr->find("td",2); $artist = super_trim(super_replace($artist->plaintext));
           $data['song'][$dem]['name'] = $song;
           $data['song'][$dem]['artist'] = $artist;
           $dem++;
       }
       $data['total'] = $dem;
        return $data;
    } else {
        return false;
    };
}

function new_song_from_collection_data($data) {
    foreach($data['song'] as $id=>$track) {
       $key = new_song($track['name'],$track['artist']);
       $data['song'][$id]['key'] = $key;
    }
    return $data;
}


function get_artist($list) {
	$list = explode(",",$list);
	return trim(str_replace(array("[","]"),"",$list[0]));
	
}

function search_data($search,$order="relevance")  {
 // published
  // url http://gdata.youtube.com/feeds/api/videos?q=chris+tomlin+lyric&start-index=1&max-results=50&v=2
  $search = super_replace(super_trim($search));
  $url="http://gdata.youtube.com/feeds/api/videos?q=".urlencode($search)."&start-index=1&max-results=10&v=2&alt=json&orderby=".$order;
  
  $data=str_replace('$','',file_get_contents($url));
 //  die($data);
  $data=json_decode($data,true);
//  debug($data);
//  exit;
  if(isset($data['feed']['entry'])) {
	  if(count($data['feed']['entry'])>0) {
		  return $data;
	  } else {
		  return false;
	  }
  } else {
	  return false;
  }
}

function get_youtube($data) {
	if(isset($data['feed']['entry'])) {
		 foreach($data['feed']['entry'] as $song)  {
			  $embed = $song['ytaccessControl'][4]['permission'];
			  if($embed=="allowed") {
				   $title=$song['title']['t'];
				   if($title!="") {
						  $pub = date("M Y",strtotime($song['published']['t']));
						  $link = str_replace("&feature=youtube_gdata","",$song['link'][0]['href']);
						  $yid = explode("?v=",$link);                      
						  $yid=$yid[1];		
						  return $yid;		   
				   }
			  }
		 }	 
	}
	 return false;
}

function update_youtube($key,$songname,$artist=" ") {
	global $db;
	$data = search_data($songname." ".$artist);
	$youtube = get_youtube($data);
	if($youtube == false ) {
		// No youtube ID, Update Song Broken
		$data = array(
			"song_broken"	=> "__ NOW()"
		);
		$res = false;
	} else {
		$data = array(
			"song_youtube"	=> $youtube,
			"song_status"	=> "active"
		);
		$res = true;
	}
	$db->update("songs",$data,"song_key='".$key."'");	
	
	return $res;	
	
}


function fast_youtube($name,$artist) {
	global $db,$helper;
	$artist = get_artist($artist);		
	$data = search_data($name." ".$artist);
	$youtube = get_youtube($data);	
	return $youtube;
	
}

function super_replace($name) {
	if(function_exists("mb_eregi_replace")) {		
	//	$name = mb_eregi_replace("/[\'\"\[\]\{\}\-\_\`]+/"," ",$name);
	//	$name = mb_eregi_replace("/\s[\s]+/"," ",$name);
		$name = preg_replace("/[\'\"\[\]\{\}\-\_\`\.]+/","",$name);
		$name = preg_replace("/\s[\s]+/"," ",$name);
        $name = preg_replace("/\([a-zA-Z0-9\s\-\.]+\)/","",$name);
	} else {
		$name = preg_replace("/[\'\"\[\]\{\}\-\_\`\.]+/"," ",$name);
		$name = preg_replace("/\s[\s]+/"," ",$name);
        $name = preg_replace("/\([a-zA-Z0-9\s\-\.\'\_\!]+\)/","",$name);
	}

    $kill = array("`","!","@","#",'$','%','^','&','*','(',')','_','-','=','+'."'",'"');
    
    $name = str_replace($kill,"",$name);
    
	$name = trim($name);
//	$name = urlencode($name);
	return $name;
}

function update_lyrics($key,$lyric) {
	global $db;
	$data = array(
		"lyric_last_update"	=> "__ NOW()",
		"lyric_text"	=> $lyric
	);
	$db->update("songs_lyrics",$data,"song_key='".$key."'");
	
}

function update_chord($key,$text) {
	global $db;
	$data = array(
		"lyric_last_update"	=> "__ NOW()",
		"guitar_chord"	=> $text
	);

	$db->update("songs_lyrics",$data,"song_key='".$key."'");	
}

?>