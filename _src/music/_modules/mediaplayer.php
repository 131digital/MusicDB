<?php
function create_media_player($key,$function="",$a=false) {	
	global $db,$helper;

	
	$ht = $db->fast_get("songs|LEFT JOIN:artist:T1.art_key=T2.art_key|INNER JOIN:songs_lyrics:T1.song_key=T3.song_key|songs_rating:T1.song_key=T4.song_key","T1.song_key='".$key."'","","*,T1.song_key as song_key, T1.art_key as art_key");
	$code = md5($ht['song_key']);
	
	// UPDATE Lyris
	if($ht['lyric_text'] == NULL) {
		run_plugins("elyrics","for_song",false,$ht['song_key']);
	}
	if($ht['guitar_chord'] == NULL) {
		run_plugins("GuitarChords","song_update",false,$ht['song_key']);
	}
	
	// UPDATE views / stats
	$key = $ht['song_key'];	
	if(!isset($_COOKIE['song_views_'.$key])) {
		$time = @date("YW");	
		$view = $db->fast_get("songs_stats","song_key='".$key."' AND song_time='".$time."'");
		if($view === false) {
			$data = array(
				"song_key"	=> $key,
				"song_like"	=> 1,
				"song_views"  => 1,
				"song_time"	=> $time
			);
			$db->insert("songs_stats",$data);
			
		} else {
			$db->fast_increase("songs_stats","song_views","song_key='".$key."' AND song_time='".$time."'");			
		}
		$db->fast_increase("songs","song_views_all","song_key='".$key."'");
		setcookie("song_views_".$key, true, time() + 3600*24*7);
		$_COOKIE['song_views_'.$key] = true;	
	}
			
	
	$url = ($ht['song_url']!="") ? $ht['song_url'] : "http://www.youtube.com/watch?v=".$ht['song_youtube'];
	$ads = "";
	if($a==false) {
		$ads = "";
	} else {
		// $ads =  "<img src='http://img397.imageshack.us/img397/6563/banner468x60qr5.gif' border=0 >";
		// $ads = "<iframe src='/ads.html' frameborder=0 scrolling=no width=468 height=120 marginheight=-20 ></iframe>";
		// <div id='ads_musicdb'>".$ads."</div>
	}
	$html = "<div style='width:468px;text-align:center;' id='div".$code."'>
			
			<div id='".$code."' name='".$code."'><p align=center ><img src='"._THEME_."/img/loading.gif' border=0 ></p></div>
			<div><p align=right ><iframe src='/buymp3/?song_name=".$ht['song_name']."&song_artist=".clean_artist($ht['song_artist'])."' frameborder=0 scrolling=no margin=0 height=20 width=250 ></iframe></p></div>
			</div>			
			<script>
			function new_media_player() {
				if(typeof jwplayer != 'undefined') {
					
  				  show_subplayer(".$ht['song_key'].");

				   clearInterval(tme);	
				  if(_VIDEO == false) {
					  var X_VIDEO = 24;
				  } else {
					  var X_VIDEO = 400;
				  }
				  jwplayer('".$code."')
					.setup({	'flashplayer': '/themes/player/player.swf',
						'file': '".$url."',
						'backcolor': 'FFFFFF',
						'frontcolor': '000000',
						'lightcolor': '888888',
						'screencolor': 'FFFFFF',
						'volume': '100',
						'autostart': 'true',
						/* 'repeat': 'list', */
						'shuffle': 'true',
						'stretching': 'none',
						'controlbar': 'bottom',
						'width': '468',
						'height': X_VIDEO,
						'youtube.quality': 'medium',
						'plugins': {
							
						}
				  })
				  .onTime( function(e) {
					  subplayer(e.duration,e.offset,Math.round(e.position));
					 
				  })
				  .onComplete(function() {
						".$function."
					});
				  
				}						
				
			}	
			
			function setup_music_ads() {
			\$('#ads_musicdb').html('<iframe src=\""._URL_."/buyalbum/?song_name=".urlencode(un_quotes($ht['song_name']))."&song_artist=".urlencode(un_quotes($ht['art_name']))."\" width=100% height=150 marginheight=0 marginwidth=0 scrolling=no frameborder=0 ></iframe>');
			}			
			
			var tme = setInterval('new_media_player();',500);								
			setTimeout('setup_music_ads();','5000');
					
		</script>
			";
			
	$html = str_replace("\n\r"," ",$html);
	
	$data['html'] = $html;
	$data['code'] = $code;
	$data['url']  = $url;
	$data['song_url'] = song_play_url($ht['song_key'],$ht['song_seo'],ini_seo(clean_artist($ht['song_artist'])));
	$data['info'] = $ht;
			
	return $data;

}
?>