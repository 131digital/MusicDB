<tr id="trsong{song_key}">
	<td width=1% ><input type=checkbox name=addto[] id="check_{song_key}" group="checksong" data="{song_key}" /> </td>
	<td><a href="{song_play_url}" onclick="play_this_song(this,{song_key});return false;" class="tiptip-right" title="Click to play - {song_name}" name="aclick{song_key}">{song_name}</a>
    <div id="song{song_key}"  avg="{song_avg}" data="{song_key}" class="right" ></div>
    
    </td>
</tr>
<script language="javascript">
   setup_raty("#song{song_key}","{THEME}/img/","{song_avg}","5",false);
</script>