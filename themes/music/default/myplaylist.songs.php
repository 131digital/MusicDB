<tr>	
	<td>{order}</td>
	<td><a href="{song_play_url}" title="Click to play - {song_name}" >{song_name}</a>
    <br /> by {song_artist}
    <div id="song{song_key}" group="songrating" avg="{song_avg}" data="{song_key}" ></div>
    </td>
    <td  >
    <input type="button" onclick="play_this_song(this,{song_key});setup_raty('#song{song_key}','{THEME}/img/','{song_avg}',5,false);" class="tiptip-top green" title="Play Song - {song_name}" name="aclick{song_key}" value="Play">
    <input type="button" onclick="" class="tiptip-left grey" title="Report Song Broken - {song_name}<br>Example: Wrong music, wrong lyrics, can't play, or sound quality too bad..." value="Report">
    <input type="button" onclick="list_delete_song({song_key},{playlist_key},this)" class="tiptip-top grey" title="Delete this song - {song_name}" name="adelete{song_key}" value="Delete">
    </td>
</tr>
<script language="javascript">
   setup_raty("#song{song_key}","{THEME}/img/","{song_avg}","5",true);
</script>