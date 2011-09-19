<?php

/* This plugins auto update new promises. Set Run 1 Time a day */

class PLUGINS_Update365Promises extends controllers {
	var $mute = false;
	var $required_modules = "cURL|resize_images|simple_html_dom";
	
	function index() {
		global $db,$helper,$config;
		$db->connect();
		$db->set_db();
		
		update_cron_time("Update365Promises");

		$path = $config['path']."/upload/365pro/";
		$cURL = new cURL();
		$xml = $cURL->get("http://www.365promises.com/daily-promises/rss.xml");
		$xml = strip_tags($xml,"<img><pubDate>");
	
		$html = str_get_html($xml);
		$dem=0;
		foreach($html->find("img") as $img) {
			$pub = $html->find("pubDate",$dem);			
			$ex = explode(@date("Y"),$pub,3);
			$pub = trim($ex[0]." ".@date("Y"));	
			$ex = explode(",",$pub);
			$pub=$ex[1];
							
			$dem++;
			$name = @date("M d Y",strtotime($pub));
			$src = $img->src;
			if(strpos($src,"/storage/") > 1 ) {
						$url = $src;
						$file = str_replace(' ','-',$name);
						$newfile = $config['path']."/upload/365pro/".$file.".jpg";
						$name468 = $config['path']."/upload/365pro/500/".$file."_468.jpg";
						$name463 = $config['path']."/upload/365pro/463/".$file."_463.jpg";
						$thumb = $config['path']."/upload/365pro/thumb/".$file.".jpg";
					    if(!file_exists($newfile)) {
							copy($url, $newfile);						
							$resize = new resize($newfile);
							$resize -> resizeImage(800, 500, 'auto'); 
							$resize -> saveImage($newfile, 85); 
							$resize -> resizeImage(150, 103, 'auto'); 
							$resize -> saveImage($thumb, 75);  		
							$resize -> resizeImage(463, 233, 'auto'); 
							$resize -> saveImage($name463, 80);  												 						
							$new_url = _URL_."/upload/365pro/".$file;
							if($this->mute == true ) {
								echo $new_url."<br>\n";
							}
						}
			}
		}

	}
	
}

?>