<tr>
<td align=left ><img src="{playlist_pic}"  height=60 width=60 align=left hspace=10 vspace=10 ></td>
<td valign=top align=left class="upperfirst" ><a href="{URL}/myplaylist/?action=edit&r={playlist_key}#playlist-tabs-edit-tab">{playlist_name}</a><br>
Sharing: {playlist_sharing}
<div id="list{playlist_key}" group="playlistrating" avg="{playlist_avg}" data="{playlist_key}"  ></div>

</td>
<td valign=middle align=center class="td-center" ><input type="button" value="{playlist_total}" onclick="window.location='{URL}/myplaylist/?action=songs&r={playlist_key}#playlist-tabs-edit-tab';" class="tiptip-top green" title="Click to update songs in this list"></td>
<td valign=middle align=center class="td-center" ><input type="button" value="{playlist_views}" onclick="window.location='{playlist_play_url}';" class="tiptip-top grey" title="Click to play this list"></td>
<td valign=middle align=center class="td-center" ><input type="button" value="{playlist_like}" onclick="window.location='{playlist_play_url}';" class="tiptip-top grey" title="Click to play this list"></td>
</tr>
<script language="javascript">
   setup_raty("#list{playlist_key}","{THEME}/img/","{playlist_avg}","5",true);
</script>