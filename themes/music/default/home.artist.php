<div class="body-con">
 	 <table width=100% cellspacing=0 cellpadding=0 border=0 id="table{art_key}"  >   
        <tbody>			
        <tr><td valign=top align=center width=1% >
        	<a href="{URL}/artist/{art_key}-{art_name}.html"><img src="{art_pic}" class="xbox tiptip-top" style="width:120px;" title="{art_name}"></a>
              <br>
         <a href="Javascript: void(0);" onclick="$('#table{art_key} input[type=checkbox]').click();$.uniform.update($('#table{art_key} input[type=checkbox]'));nextsong();" class="tiptip-top" title="Play All Songs - {art_name}" > <img src="{THEME}/img/keyplay.png"  height=32   /></a>
    <a href="Javascript: void(0);" onclick="add_to_playlist(_KEY_IS_PlAYING,this);" class="tiptip-left" title="Add To Playlist" > <img src="{THEME}/img/keynote.png"   height=32   /></a>
    <a href="Javascript: void(0);" onclick="" class="tiptip-left" title="Report Song Broken<br>Example: Wrong music, wrong lyrics, can't play, or sound quality too bad..." > <img src="{THEME}/img/question.png"  height=32  /></a>       
        </td>
	     <td valign=top >      
          {song_data}               	
        </td>
        </tr>
        </tbody>
    </table>
        
</div>