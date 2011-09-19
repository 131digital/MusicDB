	<form action="Javascript:void(0);" onSubmit="go_post('myplaylist/edit',this,'myplaylist');">
        	<label> Playlist Name:  </label>
            <input type="text" name="playlist_name" id="playlist_name" class="tiptip-top input-ok" title="A Name only accept A-Z 0-9 and space" value="{playlist_name}" /><br />
        	<label> Playlist Picture:  </label>
            <input type="text" name="playlist_pic" id="playlist_pic" value="{playlist_pic}" class="tiptip-top input-ok" title="Picture of Playlist (Optional). You can Skip it. <br>Or if you want, you must upload picture by Photobuckets.com. <br>We only accept picture from Photobucket."  /><br />            
            <label> Share and Public ? </label>
			<input type=radio name="playlist_sharing" value='yes'  /> Yes
            <input type=radio name="playlist_sharing" value='no'  /> No
            <input type="hidden" name="playlist_key" value="{playlist_key}" >
            <br />
			<p align=center >
	            <input type="submit" value="Create Playlist" />
            </p>			            
            <iframe name="plugin" src="http://photobucket.com/plugin?width=468&height=450&largeThumb=&pbaffsite=10christsongs.com&bg=%23FFFFFF&border=false&bordercolor=%23000000&url=&linkType=url&textcolor=%23000000&linkcolor=green&media=image&btntxt=&searchenabled=true&searchlinkcolor=green&searchbgcolor=white" bgcolor="transparent" width="488" height="480" frameborder="0" scrolling="no"></iframe>
        </form>
<script language="javascript">
$("input[type=radio][value='{playlist_sharing}']").click();
</script>        