<?php

class Cadmin_news_categories extends controllers {
	var $login = "simple_login";
	public function index() {
		global $output;												
	}
	
	public function ajax_delete() {
		global $_POST,$lang,$helper,$db;
		$helper->error = "";
		$key = $helper->risk('key',1, "number");
		
		$sql = $db->delete("news_categories","`cat_key` = '".$key."'",1);
		
		$data = array (
			"cat_parent" => 0
		);		
		$sql = $db->update("news_categories", $data, "`cat_parent`='".$key."'");
		
		$json['text'] = xlang("removed_data");
		$json['result'] = 'ok';
		$json['title'] = "Completed";
		
		echo create_json($json);
		
	}
	
	public function ajax_edit() {
		global $_POST,$lang,$helper,$db;
		$helper->reset_error();	
		$cat_name = $helper->fast("e_cat_name",2,"",xlang('category_name'));		
		
		$cat_seo = $helper->fast("e_cat_seo",2,"",xlang('category_seo'));	
		
		$cat_parent = $_POST['e_cat_parent'];				
		$cat_status = $_POST['e_cat_status'];
		$cat_order =  $helper->fast("e_cat_order",1,"number",xlang('category_order_number'));	
		
		$cat_key = $helper->risk("e_cat_key",1, "number");
		
		// check error
		if($helper->error!="") {
			$json['result'] = 'error';
			$json['text'] = xlang("please_check_again").$helper->error;
			$json['title'] = xlang("something_wrong");
		} else {
			$json['result'] = 'ok';
			$json['text'] = xlang("Updated Category");
			$json['title'] = xlang("completed");
			// do insert
			$data = array(
				"cat_name" => $cat_name,
				"cat_seo" => $cat_seo,
				"cat_parent" => $cat_parent,
				"cat_status" => $cat_status,
				"cat_order" => $cat_order,
			);			
			$sql = $db->update("news_categories", $data, "`cat_key`='".$cat_key."'",1);
		}				
				
		echo create_json($json);		
				
	}
	
	
	public function ajax_addnew() {
		global $_POST,$lang,$helper,$db;
		
		$helper->reset_error();	
		$cat_name = $helper->fast("cat_name",2,"",xlang('category_name'));		
		
		$cat_seo = 	$helper->fast("cat_seo",2,"",xlang('category_seo'));	
		
		$cat_parent = $_POST['cat_parent'];				
		$cat_status = $_POST['cat_status'];
		
		// check error
		if($helper->error!="") {
			$json['result'] = 'error';
			$json['text'] = xlang("please_check_again").$helper->error;
			$json['title'] = xlang("something_wrong");
		} else {
			$json['result'] = 'ok';
			$json['text'] = xlang("created new category");
			$json['title'] = xlang("completed");
			// do insert
			$data = array(
				"cat_name" => $cat_name,
				"cat_seo" => $cat_seo,
				"cat_parent" => $cat_parent,
				"cat_status" => $cat_status,
				"cat_order" => 10
			);
			
			$sql = $db->insert("news_categories", $data);
		}				
				
		echo create_json($json);
					
	}
}
?>