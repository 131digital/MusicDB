<script language="javascript">
var this_is_lyric_page = true;
$(document).ready(function() {
    $("#lyrics-tabs").tabify();	
	check_all_box(this);
	play_this_song("true","{song_key}");
		
});
</script>

<h3 class="icon_headphone upperfirst" > Playing: {song_name} - <a href="{URL}/artist/{art_key}-{art_seo}.html" >{art_name}</a>
<span class="button-h3">
</span>
</h3>
<div class="body-con">
<script type='text/javascript'><!--
google_ad_client = 'pub-9011430005420496';
/* Music DB 468x60, created 8/4/11 */
google_ad_slot = '2487096797';
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type='text/javascript'
src='http://pagead2.googlesyndication.com/pagead/show_ads.js'>
</script>
<table  cellpadding="0" cellspacing="0">
<tbody id="playingmedia">
<TR><TD align=right class=right >
<input type=button class="green tiptip-top" title="Click to turn Video On / Off for Music" onclick="video_on_off(this);" value="♪♪ Video" >
<input type=button class="tiptip-top" title="Add this song to your playlist" onclick="add_to_playlist({song_key},this);" value="♪♫ My Playlist">
</TD></TR>
</tbody>
</table>


</div>

<ul id="lyrics-tabs" class="content-tabs clearfix">
    <li class="active "><a href="#lyrics-tabs-lyrics" class="upperfirst">♫ Song Lyrics</a></li>
    <li><a href="#lyrics-tabs-chord" class="upperfirst">♪ Guitar Chord</a></li> 
    <li><a href="#lyrics-tab-submit" class="upperfirst">♪ Submit Lyrics</a></li>  
	<li><a href="Javascript:void(0)" onclick="get_report_form('Report Song ID {song_key}');" class="upperfirst">♫ Report</a></li>  
    <li><a href="Javascript:void(0);" onclick="buy_mp3('{buy_mp3}');">♥ Download Mp3</a></li>

</ul>

<div id="lyrics-tabs-lyrics">
    <div class="body-con">
    <pre style="width:480px; overflow-x:scroll;"">{lyric_text}</pre>
    </div>
</div>

<div id="lyrics-tabs-chord">
    <div class="body-con">
      <pre style="width:480px; overflow-x:scroll;">{guitar_chord}</pre>
    </div>
</div>

<div id="lyrics-tab-submit">
	<div class="body-con">
 	 <form action="Javascript: void(0);" onsubmit="go_post('lyrics/pendinglyrics/{song_key}',this,'','window.location.reload();');" method="post">
     	<label> Post Type: </label>
        <input type="radio" name="posttype"  value="lyric"  /> Lyric 
        <input type="radio" name="posttype"  value="chord"  /> Guitar Chord  <br />
		<label> You want to: </label>
        <input type="radio" name="wantto" value="submit"  /> Submit New
        <input type="radio" name="wantto" value="correct"  /> Correct / Update <br />
		<label> Lyrics / Chords:</label>      
        <textarea rows=15 name="lyrics" id="lyrics" ></textarea>
        <label> Are you human ? <img src="{URL}/?capcha=show"  /></label>
        <input type="text" class=tiptip-top name="capcha" id="capcha" title="Please enter the result to verify you are not spaming" value=""  />
        <label> Your Email: </label>
        <input type="text" name="email" value="" class="tiptip-top" title="Please enter youremail@domain.com"  />
        <p align=center >
        	<input type="submit" value="Submit / Update" />
        </p>
        
     </form>
	</div>
</div>
<div id='ads_musicdb'></div>
{artist_song}
<h3 class="icon_info"> Comments </h3>
<div id="fb-root" style="width:100%;"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="{current_url}" num_posts="20" width="475"></fb:comments>
{more_song}



