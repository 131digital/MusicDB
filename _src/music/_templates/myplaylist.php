<?php

class Tmyplaylist extends templates {
	var $themetemplate = "global";
	
	function main_body() {
		global $_GET;
		$tmp = $this->rtheme("myplaylist.main");
		
		$action = isset($_GET['action']) ? $_GET['action'] : "";
		$r = isset($_GET['r']) ? $_GET['r'] : "";
		
		$data = array();
		$data['myplaylist'] = $this->get_playlist();
		$data['playlist_edit'] = "Click on any playlist for edit";
		
		if($action=="edit") {
			$data['playlist_edit'] = $this->get_edit();
		}
		if($action=="songs") {
			$data['playlist_edit'] = $this->get_songs();
		}

						
		$html = $this->rvar($tmp,$data);
		

		echo $html;
	}
	
	
	private function get_playlist() {
		global $db,$helper;
		$user_key = $helper->data['id'];
		
		$tmp = $this->rtheme("myplaylist.mylist");
		
		$sql = $db->get("playlist","*","user_key='".$user_key."'","","playlist_like DESC, playlist_key DESC");
		$html = '';		
		while($ht = $db->fetch($sql)) {
			$ht['playlist_total'] = $db->get_total("links_playlist_songs","playlist_key","playlist_key=".$ht['playlist_key']."");
			$ht['playlist_play_url'] = _URL_."/playlist/".$ht['playlist_key']."-".ini_seo($ht['playlist_name']);
			if($ht['playlist_pic']=="") {
				$ht['playlist_pic'] = _URL_."/themes/global/img/ipod.png";
			}
			$html .= $this->rvar($tmp,$ht);
			
		}
		
		return $html;
	}
	
	private function get_edit() {
		global $db,$helper;
		$user_key = $helper->data['id'];
		$r = $helper->fast("r",1,"number");
		$html = "";
		if($r!="") {
			$list = $db->fast_get("playlist","playlist_key='".safe_quotes($r)."'  and user_key='".$user_key."'");
			if($list == false) {
				return xlang("No Playlist");
			} else {
				$tmp = $this->rtheme("myplaylist.edit");
				$html .= $this->rvar($tmp,$list);	
			}			
		}
		
		return $html;
	}
	
	private function get_songs() {
		global $db,$helper;
		$user_key = $helper->data['id'];
		$r = $helper->fast("r",1,"number");
		$table = $this->rtheme("myplaylist.songs.table");
		$html = "";
		if($r!="") {
			$list = $db->fast_get("playlist","playlist_key='".safe_quotes($r)."' and user_key='".$user_key."'");
			if($list == false) {
				return xlang("No Playlist");
			} else {
				$tmp = $this->rtheme("myplaylist.songs");
				$sql = $db->get("songs|links_playlist_songs:T1.song_key=T2.song_key|LEFT JOIN:songs_rating:T1.song_key=T3.song_key","*,T1.song_key as song_key","T2.playlist_key='".$r."'","","songpl_order DESC, playlist_song_key DESC");
				while($ht = $db->fetch($sql)) {
					$ht['order'] = $helper->order_box("links_playlist_songs","playlist_song_key", $ht['playlist_song_key'],"songpl_order", $ht['songpl_order']);
					$ht['song_artist'] = clean_artist($ht['song_artist']);
					$html .= $this->rvar($tmp,$ht);	
				}
			}			
		}
		
		$data['song_data'] = $html;
		$html = $this->rvar($table,$data);
		return $html;		
	}
}

?>