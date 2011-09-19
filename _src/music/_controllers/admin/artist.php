<?php

class Cadmin_artist extends controllers {
	var $login = "simple_login";
	public function index() {
	}
	
	function ajax_copy() {
		global $_POST,$db,$helper,$config;
		$url = $_POST['data'];
		$filename = md5($url).".jpg";
		
		copy($url,$config['path']."/upload/artist/".$filename);
		$json['text'] = $filename;
		
		echo create_json($json);
		
	}
	
	
	function ajax_cp_art_pic() {
		global $helper,$config;
		$url=$helper->fast("url",1);		
		required_modules("resize_images");
		
		$file = md5($url).".jpg";
		
		$resize = new resize($url);
		$resize -> resizeImage(170, 170, 'auto'); 
		$resize -> saveImage($config['path']."/upload/artist/".$file, 80);  
		
		$new_url = _URL_."/upload/artist/".$file;
		
		echo $new_url;		
	}
	
	function ajax_delete() {
		global $_POST,$lang,$helper,$db;
		$helper->error = "";
		$key = $helper->risk('key',1, "number");		
		
		$sql = $db->delete("artist","`art_key` = '".$key."'",1);		
		$sql = $db->delete("links_cats_artist","`art_key` = '".$key."'");			
		
		$json['text'] = xlang("removed_artist");
		$json['result'] = 'ok';
		$json['title'] = "Completed";
		
		echo create_json($json);
				
	}
	
	function ajax_edit() {
		global $_POST,$db,$helper,$config;
		$helper->reset_error();
		$art_name = $helper->fast("e_art_name",2,"",xlang("artist name"));		
		$art_seo = $helper->fast("e_art_seo",2,"",xlang("artist seo"));
				
		
		$art_youtube = $helper->fast("e_art_youtube");
        $art_itunes = $helper->fast("e_art_itunes",0);
		
		$art_auto_update = $helper->fast("e_art_auto_update",1,"",xlang("please select auto update"));
		$art_status = $helper->fast("e_art_status",1,"",xlang("please select status"));
		
		
		$art_pic = $helper->fast("e_art_pic");
		
		if($art_pic!="") {
			if(strpos($art_pic,$config['domain']) === false ) {
				required_modules("resize_images");
				$url = $art_pic;
				$file = md5($url).".jpg";
				
				$resize = new resize($url);
				$resize -> resizeImage(170, 170, 'auto'); 
				$resize -> saveImage($config['path']."/upload/artist/".$file, 80);  
				
				$new_url = _URL_."/upload/artist/".$file;	
				$art_pic = $new_url;
			}
		}
				
		$art_order = $helper->fast("e_art_order",1,"number",xlang("Order Number must greater than 0"));
		
		$art_similar = $helper->fast("e_art_similar");
		
		$art_bio = $helper->fast("e_art_bio");
		
		$r = $helper->risk("art_key",1,"number");
		
		if($helper->error == "") {			
			$data = array(
				"art_name" => $art_name,
				"art_seo" => $art_seo,
				"art_youtube" => $art_youtube,
				"art_auto_update" => $art_auto_update,
				"art_status"	=> $art_status,
				"art_pic"		=> $art_pic,
				"art_order"		=> $art_order,
				"art_similar"	=> $art_similar,
				"art_bio"		=> $art_bio,
                "art_itunes"    => $art_itunes
			);		
			
			$duplicated = array(
				"art_key" => $r	
			);
			
			// check duplicated
			if($helper->is_duplicated("artist", $duplicated ) == true ) {
				$sql = $db->update("artist", $data,"`art_key`='".$r."'", 1 );	
				
				$art_key = $r;
				$db->delete("links_cats_artist", "art_key='".$art_key."'");
				$cat = "";
				if(isset($_POST['art_cat'])) {
					$art_cat = $_POST['art_cat'];			
					foreach($art_cat as $scat) {
						$data = array(
							'cat_key' =>$scat,
							'art_key'	=> $art_key
						);
						$db->insert("links_cats_artist",$data);						
					}
				}	
				
					
			} else {			
				$helper->make_error("Hacking System");
				debug("Hacking System","NO EXISTS ARTIST WHEN UPDATE ".$r);				
			}									
		}

		if($helper->error!="") {			
			$json['result'] = "error";
			$json['text'] = xlang("please check again")." ".$helper->error;
			$json['title'] = xlang("something wrong");
			
		} else {
			$json['result'] = "ok";
			$json['text'] = xlang("updated current artist");
			$json['title'] = xlang("completed");
		}
				
		echo create_json($json);			
		
	}
	
	function ajax_addnew() {
		global $_POST,$db,$helper,$config;
		$helper->reset_error();
		$art_name = $helper->fast("art_name",2,"",xlang("artist name"));		
		$art_seo = $helper->fast("art_seo",2,"",xlang("artist seo"));
				
		
		$art_youtube = $helper->fast("art_youtube");
        $art_itunes = $helper->fast("art_itunes",0);
		
		$art_auto_update = $helper->fast("art_auto_update",1,"",xlang("please select auto update"));
		$art_status = $helper->fast("art_status",1,"",xlang("please select status"));
		
		
		$art_pic = $helper->fast("art_pic");
		
		if($art_pic!="") {
			if(strpos($art_pic,$config['domain']) === false ) {
				required_modules("resize_images");
				$url = $art_pic;
				$file = md5($url).".jpg";
				
				$resize = new resize($url);
				$resize -> resizeImage(170, 170, 'auto'); 
				$resize -> saveImage($config['path']."/upload/artist/".$file, 80);  
				
				$new_url = _URL_."/upload/artist/".$file;	
				$art_pic = $new_url;
			}
		}
		
		$art_similar = $helper->fast("art_similar");
		
		$art_bio = $helper->fast("art_bio");
		
		if($helper->error=="") {					
			$data = array(
				"art_name" => $art_name,
				"art_seo" => $art_seo,
				"art_youtube" => $art_youtube,
				"art_auto_update" => $art_auto_update,
				"art_status"	=> $art_status,
				"art_pic"		=> $art_pic,
				"art_similar"	=> $art_similar,
				"art_bio"		=> $art_bio,
                "art_itunes"    => $art_itunes
			);
			
			$duplicated = array(
				"art_name" => $art_name	
			);
			
			// check duplicated
			if($helper->is_duplicated("artist", $duplicated ) == true ) {
				$helper->make_error(xlang("this artist existed in database"));			
			} else {			
				$sql = $db->insert("artist", $data);	


				$ht = $db->fast_get("artist","","art_key DESC");
													
				$art_key = $ht['art_key'];
			
				$db->delete("links_cats_artist", "art_key='".$art_key."'");
				$cat = "";
				if(isset($_POST['art_cat'])) {
					$art_cat = $_POST['art_cat'];			
					foreach($art_cat as $scat) {
						$data = array(
							'cat_key' =>$scat,
							'art_key'	=> $art_key
						);
						$db->insert("links_cats_artist",$data);						
					}
				}						
							
			}
		}
		
		if($helper->error!="") {
			
			$json['result'] = "error";
			$json['text'] = xlang("please check again")." ".$helper->error;
			$json['title'] = xlang("something wrong");
			
		} else {
			$json['result'] = "ok";
			$json['text'] = xlang("added new artist");
			$json['title'] = xlang("completed");
		}
		
		
		echo create_json($json);				
	}	
}