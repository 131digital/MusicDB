<?php

class Cadmin_album extends controllers {
    var $login = "simple_login";
	function index() {
		
	}

    function ajax_delete() {
        global $helper,$db;
        $key = $helper->risk("key",1,"number");
        $db->delete("album","album_key='".safe_quotes($key)."'",1);

    }

    function ajax_auto_get_song() {
        global $helper;
        $id = $_GET['id'];
        required_modules("fast_function");
        $data = get_song_from_collection_id($id);
        if($data!=false) {
            $data = new_song_from_collection_data($data);
        }
        echo create_json($data);
    }

    function ajax_add_song_to_album() {
        global $helper,$db;
        $helper->reset_error();
        $song_key = $helper->fast("song_key",1,"number","song_key");
        $album_key = $helper->fast("album_key",1,"number","album_key");

        if($helper->error=="") {
            $data['addnew'] = false;
            $tmp = $db->fast_get("links_album_songs","song_key='".$song_key."' AND album_key='".$album_key."'");
            if(!$tmp['link_key']) {
                $data = array(
                    "song_key"  => $song_key,
                    "album_key" => $album_key
                );
                $db->insert("links_album_songs",$data);

                
                $total = $db->get_total("links_album_songs","song_key","album_key='".safe_quotes($album_key)."'");
                $data = array(
                   "album_tracks"   => $total
                );
                $db->update("album",$data,"album_key='".safe_quotes($album_key)."'");

                $data['addnew'] = true;
            }
            
            $song = $db->fast_get("songs|artist:T1.art_key=T2.art_key","song_key=".$song_key,"","T1.song_key,T1.song_name,T2.art_name");
            $data['key'] = $song['song_key'];
            $data['name'] = $song['song_name'];
            $data['artist'] = $song['art_name'];
            echo create_json($data);
        }
        
    }

    function ajax_remove_song_from_album() {
        global $helper,$db;
        $helper->reset_error();
        $song_key = $helper->fast("song_key",1,"number","song_key");
        $album_key = $helper->fast("album_key",1,"number","album_key");

        if($helper->error=="") {
            $db->delete("links_album_songs","song_key='".$song_key."' AND album_key='".$album_key."'");
            
            $total = $db->get_total("links_album_songs","song_key","album_key='".safe_quotes($album_key)."'");
            $data = array(
               "album_tracks"   => $total
            );
            $db->update("album",$data,"album_key='".safe_quotes($album_key)."'");

        }
    }

    function ajax_edit() {
        global $db,$helper;


		$helper->reset_error();
        $key = $helper->risk("r",1);
        
		$album_name = $helper->fast("album_name",3,"",xlang("Album Name"));
		$album_pic = $helper->fast("album_pic",0,"",xlang("Album Picture"));
		$album_status = $helper->fast("album_status",3,"",xlang("Album Status"));
		$album_about = $helper->fast("album_about",0,"",xlang("Album Information"));
		$art_name = $helper->fast("art_name",1,"",xlang("Artist Name"));
        $album_itunes = $helper->fast("album_itunes");
		$art = $db->fast_get("artist","art_name='".safe_quotes($art_name)."'");



		if(!$art['art_key'] || !isset($art['art_key'])) {
			$helper->make_error(xlang("Artist is not found"));
		} else {
			$art_key = $art['art_key'];
		}


        if($helper->error == "") {
			$data = array(
				"album_name" 	=> $album_name,
				"album_pic"		=> $album_pic,
				"album_status"	=> $album_status,
				"album_about"	=> $album_about,
				"art_key"		=> $art_key,
                "album_itunes"  => $album_itunes
			);

			$db->update("album",$data,"album_key='".safe_quotes($key)."'");

			$json['result']	= 'ok';
			$json['text']	= xlang("Updated Album");
			$json['title']	= xlang("Album");
			echo create_json($json);
		} else {
			$json['result']	= 'error';
			$json['text']	= xlang("Please check again").$helper->error;
			$json['title']	= xlang("Update Album");
			echo create_json($json);
		}


    }
    
	function ajax_addnew() {
		global $db,$helper;
		
		$helper->reset_error();
		$album_name = $helper->fast("album_name",3,"",xlang("Album Name"));
		$album_pic = $helper->fast("album_pic",0,"",xlang("Album Picture"));
		$album_status = $helper->fast("album_status",3,"",xlang("Album Status"));
		$album_about = $helper->fast("album_about",0,"",xlang("Album Information"));		
		$art_name = $helper->fast("art_name",1,"",xlang("Artist Name"));
		$art = $db->fast_get("artist","art_name='".safe_quotes($art_name)."'");
        $album_itunes = $helper->fast("album_itunes");
		
		if(!$art['art_key'] || !isset($art['art_key'])) {
			$helper->make_error(xlang("Artist is not found"));
		} else {
			$art_key = $art['art_key'];
		}
		
		if($helper->error == "") {
			$data = array(
				"album_name" 	=> $album_name,
				"album_pic"		=> $album_pic,
				"album_status"	=> $album_status,
				"album_about"	=> $album_about,
				"art_key"		=> $art_key,
                "album_itunes"  => $album_itunes,
				"album_all_views"	=> 0,
				"album_like"	=> 0,
				"album_votes"	=> 0,
				"album_avg"		=> 0,
				"album_rate"	=>	0
			);
			
			$db->insert("album",$data);
			
			$json['result']	= 'ok';
			$json['text']	= xlang("Added New Album");
			$json['title']	= xlang("New Album");
			echo create_json($json);
		} else {
			$json['result']	= 'error';
			$json['text']	= xlang("Please check again").$helper->error;
			$json['title']	= xlang("New Album");
			echo create_json($json);			
		}
		
		
		
	}
}

?>