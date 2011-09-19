<tr id="trsong{song_key}">
	<td><input type=checkbox name=addto[] id="check_{song_key}" group="checksong" data="{song_key}" /> </td>
	<td><a href="{song_play_url}" title="Click to play - {song_name}" >{song_name}</a>
    <br /> by <a href="{artist_url}" class="black">{song_artist}</a>
    </td>
    <td class=center valign=middle ><div id="song{song_key}" group="songrating" avg="{song_avg}" data="{song_key}"  ></div></td>
    <td  >
    <a href="Javascript: void(0);" onclick="play_this_song(this,{song_key});" class="tiptip-top" title="Play Song - {song_name}" name="aclick{song_key}"> <img src="{THEME}/img/keyplay.png"  height=32   /></a>
    <a href="Javascript: void(0);" onclick="add_to_playlist({song_key},this);" class="tiptip-left" title="Add To Playlist" > <img src="{THEME}/img/keynote.png"   height=32   /></a>
    <a href="Javascript: void(0);" onclick="get_report_form('Report Song ID {song_key}');" class="tiptip-left" title="Report Song Broken - {song_name}<br>Example: Wrong music, wrong lyrics, can't play, or sound quality too bad..." > <img src="{THEME}/img/question.png"  height=32  /></a>
    </td>
</tr>
<script language="javascript">
   setup_raty("#song{song_key}","{THEME}/img/","{song_avg}","5",false);
</script>