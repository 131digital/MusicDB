<?php
function update_cron_time($name) {
	global $db,$helper;
	$data = array(
		"cron_last_update"	=> "__ NOW()"
	);
	$name = safe_quotes($name);	
	$db->update("cronjob",$data,"cron_name='".$name."'");
}



function run_cron_jon() {
	global $db;
	// cron job running	
	$sql = "SELECT * FROM ".$db->make_tab_table("cronjob")." WHERE
			 NOW() >= DATE_ADD(`cron_last_update`,INTERVAL `cron_time` DAY)
			 AND `cron_status`='active'
			 AND `cron_interval` = 'DAY'
			
			UNION
			
			SELECT * FROM ".$db->make_tab_table("cronjob")." WHERE
			 NOW() >= DATE_ADD(`cron_last_update`,INTERVAL `cron_time` MINUTE)
			 AND `cron_status`='active'
			 AND `cron_interval` = 'MINUTE'	";
			 
	$sql = $db->execute($sql);		 
 
	while($ht = $db->fetch($sql)) {
		run_plugins($ht['cron_name'],"index",false);
	}	
}

function show_categories($start=0, $level = 0 ) {
	global $db,$helper,$output,$config;
		
	$tmp = $output->rtheme("categories.sidebar");
	$html = '';
	$sql = $db->get("categories","*","`cat_parent`='".$start."'","","`cat_order` ASC");
	while($ht = $db->fetch($sql)) {
		$ht['level'] = add_level($level);
		$ht['cat_url'] = _URL_."/categories/".$ht['cat_key']."-".$ht['cat_seo'];
		$html .= $output->rvar($tmp,$ht);
		// echo add_level($level)." ".$ht['cat_name'] ."<br>";
		$html .= show_categories($ht['cat_key'],$level + 1 );
	}
	
	return $html;
	
		
}


function show_artist($limit = 20) {
	global $db,$output;
	$tmp = $output->rtheme("artist.sidebar");
	$sql = $db->get("artist","art_key,art_name,art_seo,art_total_song","",$limit,"art_order DESC, art_total_song DESC");
	while($ht = $db->fetch($sql)) {		
		echo $output->rvar($tmp,$ht);
	}
}

function clean_artist($name) {
	$name = trim(str_replace(array("[","]","."),"",$name));
	if(strpos($name,",") === false ) {
	} else {
		$name = substr($name,0,strlen($name)-1);
	}
	return $name;
	
}

function song_play_url($songkey,$seo,$artist_seo="",$artist="") {
	if(($artist!="")&&($artist_seo=="")) {
		$artist_seo = ini_seo($artist);
	}
	return _URL_."/lyrics/".$songkey."-".$seo."-".$artist_seo;
}



function get_page_seo($type="title") {
	global $_SERVER;
	$url = $_SERVER['REQUEST_URI'];
	$data = array("/","-","_",".html",".php");
	$url = preg_replace("/[0-9]+/","",$url);
	
	if($type == "title") {
		$url = str_replace($data," ",$url);
	} else {
		$url = str_replace($data,",",$url);
		$ex = explode(",",$url,100);
		$data = "";
		foreach($ex as $name) {
			$name = trim($name);
			if(strlen($name) >= 6) {
				$data .= $name.",";
			} else {
				$data .= $name." ";
			}
		}
		
		$url = $data;
		
	}
	$url=trim($url);
	if(substr($url,strlen($url)-1) == ",") {

		$url=substr($url,0,strlen($url)-1);
	}
	$url = ucwords($url);
//	echo "xxxx: ".$url." xxxxx";
	return $url;
}

function show_top_song($week,$limit) {
	global $db,$helper,$config;
	$d = $helper->output->rtheme("sidebar.listsong.d");
	$limit = $limit;				
	$page = $helper->get_current_page($limit);
	
	$sql = $db->get("songs|LEFT JOIN:songs_rating:T1.song_key=T2.song_key|INNER JOIN:songs_stats:T1.song_key=T3.song_key|LEFT JOIN:artist:T1.art_key=T4.art_key","T1.*,T2.*,T3.*,T4.art_pic,T4.art_name,T4.art_seo,T1.song_key AS song_key","song_status='active' AND T3.song_time='".$week."' ",$page,"T3.song_like DESC, song_like_all DESC");		
	
	$data['page_nav']  = "";
	$dem=0;
	$html = '';
	while($ht = $db->fetch($sql)) {
		$dem++;
		$ht['no'] = $dem;
		$ht['song_artist'] = $ht['art_name'];
		if($ht['art_pic']=="") {
			$ht['art_pic'] = _THEME_."/img/avatar".rand(3,6).".jpg";
		}
		$ht['artist_url'] = $ht['art_key'] > 0 ? _URL_."/artist/".$ht['art_key']."-".$ht['art_seo'].".html" : "#";
		$ht['song_play_url'] = song_play_url($ht['song_key'],$ht['song_seo'],ini_seo($ht['song_artist']));
		
		$html .= $helper->output->rvar($d,$ht);
	}
	
	echo $html;
	
}

function listsong($sql,$nav=false,$tmp_number="",$cut_title="") {
	global $db,$helper,$config;
	$d = $helper->output->rtheme("list_song.d".$tmp_number);
	$list_song = $helper->output->rtheme("list_song".$tmp_number);
		
	if($nav!=false) {
		$data['page_nav']  = $nav;
	} else {
		$data['page_nav']  = "";
	}
	$dem=0;
	$html = '';
	while($ht = $db->fetch($sql)) {
		$dem++;
		$ht['no'] = $dem;
		$ht['song_artist'] = isset($ht['art_name']) ? $ht['art_name'] : clean_artist($ht['song_artist']);
		if($ht['art_pic']=="") {
			$ht['art_pic'] = _THEME_."/img/avatar".rand(3,6).".jpg";
		}
		// echo $ht['art_key']."xxx<br>";
		$ht['artist_url'] = $ht['art_key'] > 0 ? _URL_."/artist/".$ht['art_key']."-".$ht['art_seo'].".html" : "#";
		
		$ht['song_play_url'] = song_play_url($ht['song_key'],$ht['song_seo'],ini_seo($ht['song_artist']));
		if(($cut_title!="")&&(strlen($ht['song_name'])>$cut_title)) {
			$ht['song_name'] = substr($ht['song_name'],0,$cut_title)."...";
		}
		$html .= $helper->output->rvar($d,$ht);
	}
	if($dem==0 ) {
		$html .= "<tr><td colspan=10 >
			Sorry, No results found. Please try again.
		</td>
		</tr>";
	}
	
	$data['song_data'] = $html;		
	$html = $helper->output->rvar($list_song,$data);
			
	return $html;	
	
}



?>