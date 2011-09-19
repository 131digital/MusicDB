<?php

/* sitemap for website */

class PLUGINS_Sitemap extends controllers {
	var $mute = false;
	function index() {
		global $db,$helper,$config;
		$db->connect();
		$db->set_db();		
		update_cron_time("Sitemap");		
		
		$html='<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="http://godislove.vn/wp-content/plugins/google-sitemap-generator/sitemap.xsl"?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
		  <url>
			<loc>http://www.topworshipsongs.com/</loc>
			<lastmod>'.@date("Y-m-d").'</lastmod>
			<changefreq>daily</changefreq>
			<priority>1</priority>
		  </url>
		  <url>
			<loc>http://www.topworshipsongs.com/topsongs</loc>
			<lastmod>'.@date("Y-m-d").'</lastmod>
			<changefreq>daily</changefreq>
			<priority>1</priority>
		  </url>
		  <url>
			<loc>http://www.topworshipsongs.com/latestsongs</loc>
			<lastmod>'.@date("Y-m-d").'</lastmod>
			<changefreq>daily</changefreq>
			<priority>1</priority>
		  </url>';
		  
		$sql = $db->get("artist","*");
		while($ht=$db->fetch($sql)) {
			$html.="<url>
			<loc>http://www.topworshipsongs.com/artist/".$ht['art_key']."-".$ht['art_seo'].".html</loc>			
			<changefreq>daily</changefreq>
			<priority>0.5</priority>
		  </url>";			
		} 
		
		$sql = $db->get("songs|INNER JOIN:artist:T1.art_key=T2.art_key","*,T1.art_key as art_key,T1.song_key as song_key","song_status='active'");
		while($ht=$db->fetch($sql)) {
			$html.="<url>
			<loc>http://www.topworshipsongs.com/lyrics/".$ht['song_key']."-".$ht['song_seo']."-".$ht['art_seo']."</loc>		
			<changefreq>daily</changefreq>
			<priority>0.5</priority>
		  </url>";
		}
				
		$html.=' 
</urlset>';				
		
		$file=$config['path']."/upload/sitemap/sitemap.xml";
		$f=fopen($file,"w+");
		fwrite($f,$html);
		fclose($f);
		
		if($this->mute==true) {
			echo "Done Write Sitemap to: ".$file."<br>\n";
		}
		
		
	}		
	
}

?>