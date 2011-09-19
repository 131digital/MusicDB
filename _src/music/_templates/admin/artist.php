<?php

class Tadmin_artist extends templates {
	var $template = "global";
	
	function sidebar() {
		$this->ftemp("song.sidebar");
	}
	
	function main_html() {
		$this->ftemp("artist.main");
	}
	
	function artist_listing() {
		global $db,$helper;
		$page = $helper->get_current_page(30);
		$name = $helper->fast("name");
		if($name!="") {
			$sql = $db->get("artist","`art_order`,`art_key`,`art_name`,`art_seo`,`art_auto_update`,`art_last_update`,`art_status`,`art_pic`,`art_similar`", "art_name LIKE '%".$name."%'",$page,"`art_order` DESC, `art_key` DESC");
		} else {
			$sql = $db->get("artist","`art_order`,`art_key`,`art_name`,`art_seo`,`art_auto_update`,`art_last_update`,`art_status`,`art_pic`,`art_similar`", "",$page,"`art_order` DESC, `art_total_song` DESC");
		}
		$html	= '';
		while($ht = $db->fetch($sql)) {
			
			if(!isset($ht['last_update'])) {
				$ht['last_update'] = NULL;
			}
			
			$html .= "<tr id='tr".$ht['art_key']."' >
                <td><a class='tiptip-top' title='Edit' href='"._URL_."/admin/artist/?r=".$ht['art_key']."'; >".$ht['art_name']."</a></th>
                <td>".$ht['art_status']."</th>
				<td>".$helper->order_box("artist", "art_key", $ht['art_key'],"art_order",$ht['art_order'])."</th>
                <td>".$ht['art_auto_update']."</th>
                <td>".$ht['art_last_update']."</th>
                <td> <a class='tiptip-top' title='Edit' href='"._URL_."/admin/artist/?r=".$ht['art_key']."'; >".global_img("icon_edit.png", " alt='edit' ")."</a>
				&nbsp;&nbsp;&nbsp;	
				<a class='tiptip-top' title='Delete' href='Javascript:void(0);' onclick=fast_delete('admin/artist/delete',".$ht['art_key'].",'tr".$ht['art_key']."'); >".global_img("icon_bad.png", " alt='edit' ")."</a>  </th>
            </tr>";
		}
		
		echo $html;
		
	}
	
	function artist_nav() {
		global $db,$helper;
		echo $helper->get_page_nav($db->table,"art_key",$db->where,30);
	}
	
	public function get_category($start=0,$level=0) {
		global $db;
		$html = '';	
		
		$sql = $db->get("categories","*","`cat_parent`='".$start."'");			
		while($ht=$db->fetch($sql)) {			
			$html .= " ".add_level($level,"&nbsp;&nbsp;&nbsp;")." <input name='art_cat[]'  type='checkbox' value='".$ht['cat_key']."'> ".$ht['cat_name']." <br>";
			$html .= $this->get_category($ht['cat_key'],$level+1);
		}
		$html .= '';
		
		return $html;
	}
	

}