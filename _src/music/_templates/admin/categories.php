<?php

class Tadmin_categories extends templates {
	var $template = "global";
	
	public function sidebar() {
		$this->ftemp("categories.sidebar");
		
	}
	
	public function main_html() {
		$this->ftemp("categories.main");
	}
	
	public function get_categories($start=0,$level=0) {
		global $db;
		$html = '';	
		
		$sql = $db->get("categories","*","`cat_parent`='".$start."'");			
		while($ht=$db->fetch($sql)) {			
			$html .= "<option value='".$ht['cat_key']."'>".add_level($level)." ".$ht['cat_name']."</option>";
			$html .= $this->get_categories($ht['cat_key'],$level+1);
		}
		
		return $html;
	}
	
	function list_categories($start=0,$level=0) {
		global $db,$helper;
		$html='';
		$sql = $db->get("categories","*","`cat_parent`='".$start."'","","`cat_order` ASC");
		while($ht = $db->fetch($sql)) {
			$html .= '
			<tr id="tr'.$ht['cat_key'].'">
				<td align=left class=left >'.add_level($level,'--').'  ' .$ht['cat_name'].'</td>
				<td>'.$ht['cat_seo'].'</td>
				<td>'.$helper->order_box("categories","cat_key",$ht['cat_key'],"cat_order",$ht['cat_order']).'</td>
				<td>'.$ht['cat_status'].'</td>
				<td>
				<a class="tiptip-top" title="Edit" href="'._URL_.'/admin/categories/?r='.$ht['cat_key'].'"; >'.global_img("icon_edit.png", " alt='edit' ").'</a>
				&nbsp;&nbsp;&nbsp;	
				<a class="tiptip-top" title="Delete" href="Javascript:void(0);" onclick=fast_delete("admin/categories/delete",'.$ht['cat_key'].',"tr'.$ht['cat_key'].'"); >'.global_img("icon_bad.png", " alt='edit' ").'</a>
				</td>
			</tr>';
			$html .= $this->list_categories($ht['cat_key'],$level+1);
	  
		} // end while	
		
		return $html;
			
	}
	
}

?>