<?php

$r = $helper->fast("r",1,"number");
$r = safe_quotes($r);
$ht = $db->fast_get("songs|songs_lyrics:T1.song_key=T2.song_key","T1.song_key='".$r."'");

// $helper->set_value("#song_name");
$helper->set_value("#r",$r);
$helper->set_value("#song_url",$ht['song_url']);
$helper->set_value("#song_youtube",$ht['song_youtube']);
$helper->set_value("#song_status",$ht['song_status']);
$helper->set_checkbox_value("song_cat[]","links_cats_songs","cat_key","song_key=".$ht['song_key']);		
$video_file = ($ht['song_url']!="") ? $ht['song_url'] : "http://www.youtube.com/watch?v=".$ht['song_youtube'];

?><ul id="s-tabs" class="content-tabs clearfix">
		<li><a href="#s-tabs-url" class="active"  >Song URL</a></li>
        <li><a href="#s-tabs-lyric"  >Song Lyrics</a></li>
        <li ><a href="#s-tabs-guitar" >Guitar Chord</a></li>
</ul>
<form action="Javascript: void(0);" method="POST" onsubmit="go_post('admin/song/edit',this,'admin/song/?action=edit&r=<?=$r?>&time=<?=@date("U")?>#s-tabs-url-tab','');" >
<input type="hidden" name="r" id="r" value="" />
<div class="body-con">
    <div id="s-tabs-url" >    
           <div style="float:right;width:205px;border:1px solid #EBEBEB;padding:10px;">
           		<h3>Categories</h3>
                <div align=left style="float:right;width:200px;" class="catbox">
                <?php
                    echo $this->get_category();
                ?>
                </div>                
                <b>Report Broken: </b> <?=$ht['song_broken']?><br />
				<b>Date Added:</b> <?=$ht['song_date']?><br />
				<b>User ID:</b> <?=$ht['user_key']?><br />
                <input type="button" class="red" value="Auto Update Lyrics or Chord" onclick=""> <br>  			         
            </div>   
	    <label>Song Name:</label>
        <input type="text" name="song_name" id="song_name" value="<?=un_quotes($ht['song_name'])?>" class="tiptip-right input-ok"  title="Enter Song Name"  onblur="auto_get_seo('song_name','song_seo');" /> <br />
         <label>Artist / Singer:</label>
          <input type="text" name="song_artist" id="song_artist"  value="<?=un_quotes($ht['song_artist'])?>" class="tiptip-right input-ok " title="Use (,) for multi singers"  /> <br />    
        <label>Auto Function:</label> 
        <input type="button" class="red" value="Auto YouTube" onclick="Javascript: auto_youtube('song_name','song_artist','song_youtube');"> 
        <input type="button" class="red" value="YouTube Search" onclick="Javascript: youtube_search('song_name','song_artist');"> 
        <input type="button" class="red" value="Auto Tags" onclick="Javascript: auto_tags('song_name','song_artist','song_tags');"> 
        <br>  

		                                          
          <label>Youtube ID:</label>
          <input type="text" name="song_youtube" id="song_youtube" class="tiptip-top input-ok " title="Enter an Youtube URL: <br>http://www.youtube.com/watch?v=HFbM5aDETYM<br>OR: http://youtu.be/ATz3AdbjyRI<br>We will auto convert to Youtube ID. Required for play back this song." 
          onkeyup="auto_get_youtube('song_youtube');"
           /><br /> 
  <label>Mp3/Video URL:</label>  
<input type="text" name="song_url" id="song_url" class="tiptip-right input-ok"  title="Enter Song URL, Mp3 or Video Files"  /> <br />           

		<label>Song SEO:</label>
        <input type="text" name="song_seo" id="song_seo" value="<?=un_quotes($ht['song_seo'])?>" class="tiptip-right" title="Required for SEO"  /><br />             
        <label>Song Tags:</label>              
        <input type="text" name="song_tags" id="song_tags" value="<?=un_quotes($ht['song_tags'])?>" class="tiptip-right" title="Use (,) for multi Tags"  /><br />
		<label>Status:</label>
        <select name="song_status" id="song_status" >
        	<option value="active">Active</option>
            <option value="inactive">InActive</option>
            <option value="waiting">Waiting</option>
        </select>   
<br />

		<label>Song Like Total:</label>
        <input type="text" name="song_like_all" id="song_like_all" value="<?=un_quotes($ht['song_like_all'])?>" class="tiptip-right" title="Total People Like This Song"  /><br />             
        <label>Song Views Total:</label>              
        <input type="text" name="song_views_all" id="song_views_all" value="<?=un_quotes($ht['song_views_all'])?>" class="tiptip-right" title="Total People Visit The Song Page"  /><br />        
                	  
   		
  </div>  
    

   <div  id="s-tabs-lyric" >
   <label>Song Lyrics:</label>
   <textarea cols=120 rows=15 name="song_lyric" id="song_lyric" ><?=un_quotes($ht['lyric_text']);?></textarea>
   </div> 
   <div  id="s-tabs-guitar" >   
   <label>Guitar Chords + Lyrics:</label>
   <textarea cols=120 rows=15 name="song_guitar" id="song_guitar" ><?=un_quotes($ht['guitar_chord']);?></textarea>
   </div>
   		<br />
	<p align=center >
    	<input type="submit" name="submit" value="Update This Song"  /> <br /><br />
        <div id='mediaspace' style='text-align:center;'></div> 
        <script language=Javascript src="<?=_URL_?>/themes/player/jwplayer.js" ></script>
        <script language="javascript">
        $(document).ready(function() {
          	setup_media_player("<?=$video_file?>");   
			$.uniform.update($("input[type=checkbox]"));
            $.uniform.update($("select"));
        });
        </script>
                
    </p>
   </div>	    
 </form>
 
