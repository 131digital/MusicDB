<li><a href="{song_play_url}"  onclick="play_this_song(this,{song_key});setup_raty('#song{song_key}','{THEME}/img/','{song_avg}',5,false);return false;" style="text-transform:uppercase">{song_name} <span> / {song_artist}</span></a>
</li>
<div style="visibility:hidden;position:absolute;left:0;top:0;"><input  type=checkbox name=addto[] id="check_{song_key}" group="checksong" data="{song_key}" />
<div id="song{song_key}" group="songrating" avg="{song_avg}" data="{song_key}" ></div>
<script language="javascript">
   setup_raty("#song{song_key}","{THEME}/img/","{song_avg}","5",true);
</script>


</div>