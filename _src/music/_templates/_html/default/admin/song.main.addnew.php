<ul id="s-tabs" class="content-tabs clearfix">
		<li><a href="#s-tabs-url" class="active"  >Song URL</a></li>
        <li><a href="#s-tabs-lyric"  >Song Lyrics</a></li>
        <li ><a href="#s-tabs-guitar" >Guitar Chord</a></li>
</ul>
<form action="Javascript: void(0);" method="POST" onsubmit="go_post('admin/song/addnew',this,'admin/song/?action=addnew&time=<?=@date("U")?>#s-tabs-url-tab','');" >
<div class="body-con">
    <div id="s-tabs-url" >    
           <div style="float:right;width:205px;border:1px solid #EBEBEB;padding:10px;">
           		<h3>Categories</h3>
                <div align=left style="float:right;width:200px;" class="catbox">
                <?php
                    echo $this->get_category();
                ?>
                </div>
            </div>   
	    <label>Song Name:</label>
        <input type="text" name="song_name" id="song_name" class="tiptip-right input-ok"  title="Enter Song Name"  onblur="auto_get_seo('song_name','song_seo');" /> <br />
        <label>Artist / Singer:</label>
        <input type="text" name="song_artist" id="song_artist" class="tiptip-right input-ok " title="Use (,) for multi singers"  /> <br />       
        
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
        <input type="text" name="song_seo" id="song_seo" class="tiptip-right" title="Required for SEO"  /><br />             
        <label>Song Tags:</label>              
        <input type="text" name="song_tags" id="song_tags" class="tiptip-right" title="Use (,) for multi Tags"  /><br />
		<label>Status:</label>
        <select name="song_status" id="song_status" >
        	<option value="active">Active</option>
            <option value="inactive">InActive</option>
            <option value="waiting">Waiting</option>
        </select>           	  
   		<br />
  </div>  
    

   <div  id="s-tabs-lyric" >
   <label>Song Lyrics:</label>
   <textarea cols=120 rows=15 name="song_lyric" id="song_lyric" ></textarea>
   </div> 
   <div  id="s-tabs-guitar" >   
   <label>Guitar Chords + Lyrics:</label>
   <textarea cols=120 rows=15 name="song_guitar" id="song_guitar" ></textarea>
   </div>
   		<br />
	<p align=center >
    	<input type="submit" name="submit" value="Add New Song"  />
    </p>
   </div>	    
 </form>    