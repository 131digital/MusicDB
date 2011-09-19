<?php
/**
 * Created by Khoa Bui.
 * www.dkphp.com
 * Y!M: khoaofgod@yahoo.com
 */

class Cadmin_news extends controllers {
    var $login = "simple_login";
    function index() {
        
    }

    function ajax_delete() {
        global $db,$helper;
        $key = $helper->risk("key",1,"number","Key");
        if($key) {
            $db->delete("news","news_key = '".safe_quotes($key)."'",1);
        }
    }

    function ajax_post() {
        global $db,$helper;

        $helper->reset_error();
        $title = $helper->fast("title",2,"",xlang("Post Title"));
        $seo   = $helper->fast("seo",2,"",xlang("Post SEO"));
        $status = $helper->fast("status",2,"");
        $picture = $helper->fast("picture",0);
        $date = $helper->fast("date",3);
        $post = $helper->fast("post",3,"",xlang("Post Content"));
        $tag = $helper->fast("tag",0,"",xlang("Tags"));

        if($helper->error=="") {
             $date = @date("Y-m-d",strtotime($date));
            $data = array(
                "news_title"    => $title,
                "news_seo"      => $seo,
                "news_post"     => $post,
                "news_date"     => $date,
                "news_picture"  => $picture,
                "news_status"   => $status,
                "news_tag"      => $tag
            );

            $db->insert("news",$data);

            $tmp = $db->fast_get("news","1","news_key DESC");
            
            $key = $tmp['news_key'];
            $cat = $helper->fast("news_cat",0,"array");
            if($cat!=false) {
                foreach($cat as $cat_key) {
                        $data = array(
                            "cat_key"   => $cat_key,
                            "news_key"  => $key
                         );
                        $db->insert("links_cats_news",$data);
                }
            }

            

            $json['result'] = "ok";
            $json['title']  = "Add New Post";
            $json['text']   = "Your Post Have Been Added";
        } else {
            $json['result'] = "error";
            $json['title']  = "Posting Error";
            $json['text']   = "Please check again ".$helper->error;
        }
        
        echo create_json($json);

    }

}
