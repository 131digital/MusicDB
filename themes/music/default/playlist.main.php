<h3 class="icon_sound upperfirst"> ♫ Playing {playlist_name} </h3>
<div class="body-con">
<table width=100% cellsapcing=2 >
    <tr>
    		<td valign=top align=center width=1% >
        <img src="{playlist_pic}" width=150 align=left hspace=10 vspace=10 border=1 class="xbox" style="width:150px;" >
        </td>
        <td valign=top align=left >
            ♪ <a href="{playlist_play_url}" class="upperfist">{playlist_name}</a><br>
            &nbsp;&nbsp;&nbsp; Created By {creator}
            <br><br>

            ♪ Rating:
            <div id="playlist{playlist_key}" avg="{playlist_avg}" data="{playlist_key}"  ></div>
            <!-- AddThis Button BEGIN -->

            ♪ Want to share this playlist? 
            
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style ">
            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a><a class="addthis_button_tweet"></a><a class="addthis_button_google_plusone"></a>
            </div>
            <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e4150d05b2c435d"></script>
            <!-- AddThis Button END -->
                        
          
         
            <script language="javascript">
               var playlist = new Array("playlist","playlist","playlist_key");
               setup_raty("#playlist{playlist_key}","{THEME}/img/","{playlist_avg}","5", false, playlist);
            </script>           

        </td>
    </tr>   
</table>

</div>
{song_data}

<div id="fb-root" style="width:100%;"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="{CURL}" num_posts="5" width="500"></fb:comments>