<script language="javascript">
$(document).ready(function(e) {
   $("#playlist-tabs").tabify();	 
});
</script>
<ul id="playlist-tabs" class="content-tabs clearfix">
    <li class="active "><a href="#playlist-tabs-mylist" class="upperfirst">All Playlist</a></li>
    <li><a href="#playlist-tabs-addnew" >Create New Playlist</a></li> 
	<li><a href="#playlist-tabs-edit" >Edit Playlist</a></li>          
</ul>

<div id="playlist-tabs-mylist">
    <div class="body-con">
    <table width=100% >
    	<thead>
        	<th></th>
            <th>Playlist Name</th>
            <th>Total Songs</th>
            <th>Total Play</th>
            <th>People Like It</th>
        </thead>
        <tbody>
	        {myplaylist}
        </tbody>
    </table>
    	
    </div>
</div>
<div id="playlist-tabs-addnew">
    <div class="body-con">
    	<form action="Javascript:void(0);" onsubmit="go_post('myplaylist/addnew',this,'myplaylist');">
        	<label> Playlist Name:  </label>
            <input type="text" name="playlist_name" id="playlist_name" class="tiptip-top input-ok" title="A Name only accept A-Z 0-9 and space" /><br />
        	<label> Playlist Picture:  </label>
            <input type="text" name="playlist_pic" id="playlist_pic" value="" class="tiptip-top input-ok" title="Picture of Playlist (Optional). You can Skip it. <br>Or if you want, you must upload picture by Photobuckets.com. <br>We only accept picture from Photobucket." /><br />            
            <label> Share and Public ? </label>
			<input type=radio name="playlist_sharing" value='yes'  checked /> Yes
            <input type=radio name="playlist_sharing" value='no'  /> No
            <br />
			<p align=center >
	            <input type="submit" value="Create Playlist" />
            </p>			            
            <iframe name="plugin" src="http://photobucket.com/plugin?width=468&height=450&largeThumb=&pbaffsite=10christsongs.com&bg=%23FFFFFF&border=false&bordercolor=%23000000&url=&linkType=url&textcolor=%23000000&linkcolor=green&media=image&btntxt=&searchenabled=true&searchlinkcolor=green&searchbgcolor=white" bgcolor="transparent" width="488" height="480" frameborder="0" scrolling="no"></iframe>
        </form>
    </div>
</div>
<div id="playlist-tabs-edit">
    <div class="body-con">
    	{playlist_edit}
    </div>
</div>