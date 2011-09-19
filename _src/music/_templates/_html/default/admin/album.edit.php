<?php
/**
 * Created by Khoa Bui.
 * Date: ${DATE} ${TIME}
 * E-Mail: khoaofgod@yahoo.com | Website http://www.dkphp.com
 */

$helper->set_value("#album_name",$data['album_name']);
$helper->set_value("#album_pic",$data['album_pic']);
$helper->set_value("#art_name",$data['art_name']);
$helper->set_value("#r",$data['album_key']);
$helper->set_value("#album_status",$data['album_status']);
$helper->set_value("#album_itunes",$data['album_itunes']);


?>
<script language="Javascript">
    var album_key = "<?=$data['album_key']?>";
</script>
    
<h3> Edit Album </h3>
    <div class="body-con">
        <form action="Javascript:void(0);" method="post" onsubmit="go_post('admin/album/edit',this,'','');">
                    <label> Album Name: </label>
                    <input type="text" class="tiptip-top" name="album_name" id="album_name" title="Enter Album / CD Name" value=""  /><br />
                   <label> iTunes Collection ID: </label>
                    <input type="text" class="tiptip-top" name="album_itunes" id="album_itunes" title="Use for automatic get songs" value=""  />
                    <input type="button" class="red" value="Auto Get" onclick="auto_itunes_collection('album_name','album_itunes','album_pic');" accept="">
                    <br />

                    <label> Album Picture: </label>
                    <input type="text" class="tiptip-top" name="album_pic" id="album_pic" title="URL To Album Picture" value="http://"  /><br />
                    <label> Artist: </label>
                    <input type="text" class="tiptip-top" name="art_name" id="art_name" title="Enter Artist / Singer Name" value=""  /><br />
                    <input type="hidden" name="r" id="r" value="">
                    <label> Album Status: </label>
                    <select name="album_status" id="album_status">
                        <option value="Coming Soon"> Coming Soon </option>
                        <option value="Waiting Admin"> Waiting Admin </option>
                        <option value="InActive"> InActive </option>
                        <option value="Active"> Active </option>
                    </select><br />

                    <label> About / Information: </label>
                    <textarea name="album_about" id="album_about" rows=10 style="width:90%;" class="box-large wysiwyg" ><?=un_quotes($data['album_about'])?></textarea>
                    <p align=center >
                        <input type="submit" value="Update"  />
                        
                    </p>

        </form>
</div>


<table>
    <thead>
        <th>No.</th>
        <th>Song Name</th>
        <th>Artist</th>
        <th>Action</th>
    </thead>
    <tbody id="body-song">
<?php
    $this->get_songs_in_album($data['album_key']);
?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan=20 >
                <form accept="">
                    <label> Search Songs: </label>
                    <input type="text" name="song_name" id="song_name" value="" accept="" style="width:260px;">
                    <input type="button" value="New Song" onclick="window.open('<?=_URL_?>/admin/song/?action=addnew#s-tabs-url-tab');">
                    <input type="button" class="red" value="Auto Tracks" class="tiptip-top" title="You need iTunes Collection ID" accept="" onclick="get_song_from_album('album_itunes','#body-song');">

                </form>
            </td>
        </tr>
    </tfoot>
</table>

<script language="Javascript" >
    $(document).ready(function() {
        $.uniform.update($("select"));
    });
</script>