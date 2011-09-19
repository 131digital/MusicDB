<?php

class Tadmin_song extends templates {
	var $template = "global";
	
	public function sidebar() {
		$this->ftemp("song.sidebar");
	}
	
	public function main_html() {
		$this->ftemp("song.main");		
	}
	
	public function get_category($start=0,$level=0) {
		global $db;
		$html = '';	
		
		$sql = $db->get("categories","*","`cat_parent`='".$start."'");			
		while($ht=$db->fetch($sql)) {			
			$html .= " ".add_level($level,"&nbsp;&nbsp;&nbsp;")." <input name='song_cat[]'  type='checkbox' value='".$ht['cat_key']."'> ".$ht['cat_name']." <br>";
			$html .= $this->get_category($ht['cat_key'],$level+1);
		}
		$html .= '';
		
		return $html;
	}
	
	public function get_search_song() {
		global $helper,$db,$_GET;
		$kw = $helper->fast("song","3");
		$kw = safe_quotes($kw);
		$html = '';
		$type = $helper->fast("type");
		$page = $helper->get_current_page(30);
		if($kw!="") {
			$sql = $db->get("songs|songs_lyrics:T1.song_key=T2.song_key|LEFT JOIN:artist:T1.art_key=T3.art_key","*,T1.song_key as song_key,T3.art_key as art_key","song_name like '%".$kw."%' OR song_youtube = '".$kw."' OR art_name = '".$kw."' OR song_artist like '%".$kw."%'",$page,"T1.song_key DESC");			
			$nav = $helper->get_page_nav("songs","song_key","song_name like '%".$kw."%'",30);
		} else {
			switch ($type) {
				case "update" : 
					$sql = $db->get("songs","*","song_status='waiting'",$page,"song_key DESC");	
					$nav = $helper->get_page_nav("songs","song_key","song_status='waiting'",30);					
					break;
				case "broken" :
					$sql = $db->get("songs","*","song_broken IS NOT NULL",$page,"song_key DESC");	
					$nav = $helper->get_page_nav("songs","song_key","song_broken IS NOT NULL",30);										
					break;
				case "inactivebroken" :
					$sql = $db->get("songs","*","song_broken IS NOT NULL and song_status='inactive'",$page,"song_key DESC");	
					$nav = $helper->get_page_nav("songs","song_key","song_broken IS NOT NULL and song_status='inactive'",30);										
					break;
				case "inactive" :
					$sql = $db->get("songs","*","song_status='inactive'",$page,"song_key DESC");	
					$nav = $helper->get_page_nav("songs","song_key","song_status='inactive'",30);										
					break;	
				case "nocat" :
					$sql = $db->get("songs","*","song_cat IS NULL or song_cat=''",$page,"song_key DESC");	
					$nav = $helper->get_page_nav("songs","song_key","song_cat IS NULL or song_cat=''",30);										
					break;														
				default:
					$sql = $db->get("songs","*","song_status='waiting'",$page,"song_key DESC");	
					$nav = $helper->get_page_nav("songs","song_key","song_status='waiting'",30);							
					break;
			}

		}
		$dem=0;
		while($ht = $db->fetch($sql)) {
			$dem++;
			$html.='<tr id="tr'.$ht['song_key'].'">
						<td><a class="tiptip-top" title="Edit" href="'._URL_.'/admin/song/?action=edit&r='.$ht['song_key'].'#s-tabs-url-tab"; >'.un_quotes($ht['song_name']).'</a></td>							        
						<td>'.un_quotes($ht['song_artist']).'</td>
						<td>'.$ht['song_date'].'</td>
						<td>'.$ht['song_broken'].'</td>
						<td>'.$ht['song_status'].'</td>               
						<td>
			<a class="tiptip-top" title="Edit" href="'._URL_.'/admin/song/?action=edit&r='.$ht['song_key'].'#s-tabs-url-tab"; >'.global_img("icon_edit.png", " alt='edit' ").'</a>
				&nbsp;&nbsp;&nbsp;	
			<a class="tiptip-top" title="Delete" href="Javascript:void(0);" onclick=fast_delete("admin/song/delete",'.$ht['song_key'].',"tr'.$ht['song_key'].'"); >'.global_img("icon_bad.png", " alt='delete' ").'</a>
			</td>
					</tr> ';
		}
		if($dem==0) {
			$html.='<tr><td colspan=20 align=center >'.xlang("No Result Found").'</td></tr>';
		} else {
			$html.='<tr><td colspan=100 >'.$nav.'</td></tr>';
		}
		
		
		echo $html;
	}
	

	
}

?>