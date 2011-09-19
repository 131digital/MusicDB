<?php
/**
 * Created by Khoa Bui.
 * www.dkphp.com
 * Y!M: khoaofgod@yahoo.com
 */
 
class Tadmin_news extends templates {
        var $template = "global";
        function sidebar() {
            $this->ftemp("news.sidebar");
        }

        function main_html() {
            global $db,$helper;
            $action = $helper->fast("action",1,"");
            if($action=="post") {
                $this->ftemp("news.post");
            }elseif($action=="edit") {
                $r = $helper->fast("r",1,"number","R Number");
                $data = $db->fast_get("news","news_key='".safe_quotes($r)."'");
                $this->ftemp("news.edit");

            } else {
                $this->ftemp("news.main");
            }


        }

        function news_nav($limit=30) {
            global $db,$helper;
            $nav = $helper->get_page_nav($db->table,"news_key",$db->where,$limit);
            echo $nav;
        }

        function news_listing($limit=30) {
            global $db,$helper;
            $db->get("news","news_key, news_title, news_date, news_status ",1,$helper->get_current_page($limit),"news_key DESC");
            $tmp = $this->rtemp("news.listing");
            $html = "";
            while($ht=$db->fetch()) {
                $ht['news_edit_link'] = _URL_."/admin/news/?action=edit&r=".$ht['news_key'];
                $ht['news_id'] = md5("trnews".$ht['news_key']);
                $ht['news_delete_link'] = "fast_delete('admin/news/delete',".$ht['news_key'].",'".$ht['news_id']."');";
                $html .= $this->rvar($tmp,$ht);
            }
            echo $html;
        }

        public function get_category($start=0,$level=0) {
            global $db;
            $html = '';

            $sql = $db->get("news_categories","*","`cat_parent`='".$start."'");
            while($ht=$db->fetch($sql)) {
                $html .= " ".add_level($level,"&nbsp;&nbsp;&nbsp;")." <input name='news_cat[]'  type='checkbox' value='".$ht['cat_key']."'> ".$ht['cat_name']." <br>";
                $html .= $this->get_category($ht['cat_key'],$level+1);
            }
            $html .= '';

            return $html;
        }
    
}
