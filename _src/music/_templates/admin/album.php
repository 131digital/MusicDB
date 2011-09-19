<?php

class Tadmin_album extends templates {
	var $template = "global";
	
	function sidebar() {
		$this->ftemp("song.sidebar");
	}
	
	
	function main_html() {
        global $db,$helper;
        $action = isset($_GET['action']) ? $_GET['action'] : "";
        
        if($action=="edit") {
            $r = $helper->fast("r",1,"number","hacking system");
            $album = $db->fast_get("album|artist:T1.art_key=T2.art_key","album_key='".safe_quotes($r)."'");

            $this->ftemp("album.edit",$album);
        } else {
		    $this->ftemp("album.main");
        }
	}
	
	function get_album($limit) {
		global $db,$helper;
		$temp = $this->rtemp("album.listing");
        $page = $helper->get_current_page($limit);
        $sql = $db->get("album|artist:T1.art_key=T2.art_key","*","", $page ,"album_key DESC");
        $html = "";
        while($ht = $db->fetch($sql)) {
            $html .= $this->rvar($temp,$ht);
        }

        $album['listing']=$html;
        $album['nav'] = $helper->get_page_nav($db->table,"album_key", $db->where,$limit );
        return $album;
		
	}

    function get_songs_in_album($album_key) {
        global $db,$helper;
        $tmp = $helper->output->rtemp("album.song.listing");
        $db->get("links_album_songs|INNER JOIN:album:T2.album_key=T1.album_key|INNER JOIN:songs:T3.song_key = T1.song_key|INNER JOIN:artist:T4.art_key = T3.art_key","*","T1.album_key = '".safe_quotes($album_key)."'");
        $html = "";
        $dem=1;
        while($ht = $db->fetch()) {
            $ht['no'] = $dem;
            $html.= $helper->output->rvar($tmp,$ht);
            $dem++;
        }
        echo $html;
    }
	
}

?>