

<div class="body-con">
 	 <table id="sortcolor">
        <thead>
          
	            <th><input type="checkbox" onclick="check_all_box(this);" /></th>
                <th>♪ ♪ ♫ Song Title</th>
                <th width=100 > <input type=button class="green tiptip-top" title="Click to turn Video On / Off for Music" onclick="video_on_off(this);" value="♪♪ Video">  </th>                         
                <th width=110 > <input type=button class="green tiptip-top" title="Play All Songs" onclick="check_all_box(this);nextsong();" value="♫ Play All ♪"></th>
           
        </thead>
        <tbody id="playingmedia">
          {song_data}
          <tr><td colspan=10 ></td></tr>
        </tbody>
    </table>
    
{page_nav}
    
</div>