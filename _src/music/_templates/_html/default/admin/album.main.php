<ul id="s-tabs" class="content-tabs clearfix">
    <li class="active"><a href="#s-tabs-listing" >Album / CD</a></li>
    <li><a href="#s-tabs-addnew" id="atabsaddnew">Add New Album</a></li>
</ul>
<div class="body-con">
    <div id="s-tabs-listing">
    	<table> 
        	<thead>
            	<th> Name </th>
                 <th> Tracks </th>
                <th> Artist </th>
                <th> Status </th>
                <th> Action </th>
            </thead>
			<tbody>            
    	<?php
			$album = $this->get_album(20);
            echo $album['listing'];
		?>
        	</tbody>
        </table>
        <?php
           echo $album['nav'];
        ?>
    </div>

    <div id="s-tabs-addnew">
    	<form action="Javascript:void(0);" method="post" onsubmit="go_post('admin/album/addnew',this,'admin/album','');">
        	<label> Album Name: </label>
            <input type="text" class="tiptip-top" name="album_name" id="album_name" title="Enter Album / CD Name" value=""  /><br />
            <label> iTunes Collection ID: </label>
            <input type="text" class="tiptip-top" name="album_itunes" id="album_itunes" title="Use for automatic get songs" value=""  />
            <input type="button" class="red" value="Auto Get" onclick="auto_itunes_collection('album_name','album_itunes','album_pic');" accept="">
            <br />
            <label> Album Picture: </label>
            <input type="text" class="tiptip-top" name="album_pic" title="URL To Album Picture" value="http://"  /><br />
			<label> Artist: </label>
            <input type="text" class="tiptip-top" name="art_name" id="art_name" title="Enter Artist / Singer Name" value=""  /><br />	          
            <label> Album Status: </label>
            <select name="album_status" id="album_status">
            	<option value="Coming Soon"> Coming Soon </option>
                <option value="Waiting Admin"> Waiting Admin </option>
                <option value="InActive"> InActive </option>
                <option value="Active"> Active </option>
            </select><br />
            
            <label> About / Information: </label>
            <textarea name="album_about" id="album_about" rows=10   style="width:90%;" ></textarea>
            <p align=center >
            	<input type="submit" value="Add New"  />
            </p>
                    	
        </form>    
    </div>
</div>