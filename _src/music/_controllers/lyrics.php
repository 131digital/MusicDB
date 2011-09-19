<?php

class Clyrics extends controllers {
	var $required_modules = "mediaplayer";
	
	function index() {
	}
	
	
	function ajax_pendinglyrics() {
		global $db,$helper,$config;
		$key = action(3);
		
		if(!isset($key) || $key=="") {
			exit;
		}
		
		$helper->reset_error();
		$posttype = $helper->fast("posttype",1,"",xlang("please select post type"));
		$wantto = $helper->fast("wantto",1,"",xlang("you want submit new or update"));
		$lyrics = $helper->fast("lyrics",100,"",xlang("please enter lyrics"));
		$email = $helper->fast("email",10,"email",xlang("please enter your email"));
		$capcha = $helper->fast("capcha",1,"",xlang("please enter capcha"));
		if($capcha != read_capcha()) {
			$helper->make_error(xlang("wrong capcha"));
		}
		
		$song = $db->fast_get("songs|INNER JOIN:songs_lyrics:T1.song_key=T2.song_key","T1.song_key='".safe_quotes($key)."'","","*,T1.song_key as song_key");
		
		if($helper->error!="" || !$song['song_key']) {
			
			$json['result'] = 'error';
			$json['text'] = "Sorry, please take a look your form again.".$helper->error;
			$json['title'] = "Problem";			
			echo create_json($json);
			exit;
		} 
		
		if($posttype == "lyric") {
			
			if($song['lyric_text'] == NULL || $song['lyric_text'] == "") {
				$lyrics = "Pending...\n------------\n\n".$lyrics;
			}
			if($wantto == "submit" and ($song['lyric_text'] == NULL or $song['lyric_text'] == "")) {
				$data['lyric_text'] = $lyrics;
				$db->update("songs_lyrics",$data,"song_key='".$key."'");
			} else {
				$subject="Update Lyric: ".$song['song_name']." / ".$song['song_artist']." - Key :".$song['song_key'];
				$body = $lyrics;
				$helper->send_mail("php",$config['system']['admin'],$subject,$body); 
				$helper->mailbox($subject,"songupdate",$email,$body);
			}
			
		} else {

			if($song['guitar_chord'] == NULL || $song['guitar_chord'] == "") {
				$lyrics = "Pending...\n------------\n\n".$lyrics;
			}
			if($wantto == "submit" and ($song['guitar_chord'] == NULL or $song['guitar_chord'] == "")) {
				$data['guitar_chord'] = $lyrics;
				$db->update("songs_lyrics",$data,"song_key='".$key."'");
			} else {
				$subject="Update Guitar Chord: ".$song['song_name']." / ".$song['song_artist']." - Key :".$song['song_key'];
				$body = $lyrics;
				$helper->send_mail("php",$config['system']['admin'],$subject,$body); 
				$helper->mailbox($subject,"songupdate",$email,$body);
			}
			
		}
		$json['result'] = 'ok';
		$json['text'] = 'Thank your for your submit! We will take care it in 24 - 48 hours.';
		$json['title'] = "Completed";
		create_new_capcha();
		echo create_json($json);
		
	}
	
	function ajax_show_lyris_info() {
		global $db,$helper;
		$key=safe_quotes($_GET['key']);
		$ht = $db->fast_get("songs|LEFT JOIN:artist:T1.art_key=T2.art_key|LEFT JOIN:songs_stats:T1.song_key=T3.song_key AND T3.song_time='".@date("YW")."'|songs_rating:T1.song_key=T4.song_key","T1.song_key='".$key."'","","*,T1.song_key As song_key, T1.art_key as art_key");
					
		$ht['art_url'] = _URL_."/artist/".$ht['art_key']."-".$ht['art_seo'].".html";
		$ht['song_playing'] = _URL_."/lyrics/".$ht['song_key']."-".$ht['song_seo']."-".$ht['art_seo'].".html";
		$ht['art_bio'] = str_replace("\n","",str_replace("'","",substr(strip_tags(un_quotes($ht['art_bio'])),0,150))."...");
		if($ht['art_pic'] == "") {
			$ht['art_pic'] = _URL_."/themes/global/img/itunes.png";
		}
		
		echo create_json($ht);
		
	}
	
}

?>