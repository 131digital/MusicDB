<!-- Sidebar tabs -->
<ul id="s-tabs" class="content-tabs clearfix">
    <li class="active"><a href="#s-tabs-listing" >Artists</a></li>
    <li><a href="#s-tabs-addnew" id="atabsaddnew">Add New Artist</a></li>
<?php
	if(isset($_GET['r'])) {
		echo '<li><a href="#s-tabs-edit" id="a-tabs-edit">Edit Artist</a></li>';
	}
?>	
    
</ul>
<!-- END Sidebar tabs -->

<div class="body-con">
    
    <!-- Tabs content -->
    <div id="s-tabs-listing">
   	 <!-- Galleries -->
   	 <table id="sort">
        <thead>
            <tr>
                <th>Artist Name</th>
                <th>Status</th>
                <th>Order</th>
                <th>Auto Update</th>
                <th>Last Update</th>
                <th>Tools</th>
            </tr>
        </thead>
        <tbody >
           <?php
		   		$this->artist_listing();
				
		   ?>
        </tbody>
    </table>
    <?php
		$this->artist_nav();
	?>
    <!-- END Galleries -->

    </div>
    
    <div id="s-tabs-addnew" class="left">
    	<form action="Javascript: void(0);" method="post" onSubmit="go_post('admin/artist/addnew',this,'admin/artist');" >
            <div style="float:right;width:205px;border:1px solid #EBEBEB;padding:10px;">
           		<h3>Categories</h3>
                <div align=left style="float:right;width:200px;" class="catbox">
                <?php
                    echo $this->get_category();
					
                ?>
                </div>                
            </div> 
        	<label for="art_name">Artist Name:</label>
            <input type="text" name="art_name" id="art_name" class="tiptip-right input-ok" title="Enter Aritst Name" onBlur="auto_get_seo('art_name','art_seo');artist_youtube('art_name','art_youtube');" > <br>
        	<label for="art_seo">SEO base on Name:</label>
            <input type="text" name="art_seo" id="art_seo" class="tiptip-right" title="SEO for Searching" > <br>
            <label>Youtube Artist URL:</label>
            <input type="text" name="art_youtube" id="art_youtube"  style="width:230px;" class="tiptip-bottom" title="Example: http://www.youtube.com/artist/Chris_Tomlin <br>We will auto update songs for this artist from youtube.<br>Leave its blank if you don't know about this URL."> <input type="button" class="red" value="Verify" onclick="window.open(document.getElementById('art_youtube').value);"> <br>  
            <label>Auto Update Songs From YouTube:</label>
            <input type="radio" name="art_auto_update" value="yes" class="tiptip-top" title="Auto update every weeks"> Yes 
            <input type="radio" name="art_auto_update" value="no" checked > No  
            <br>
            <label>Status</label>
            <select name="art_status" id="art_status">
            	<option value="active">Active</option>
                <option value="inactive">Inactive</option>               
            </select>       <br>
            <label>iTunes Artist ID:</label>
            <input type="text" name="art_itunes" id="art_itunes" value=""  style="width:230px;" accept="" class="tiptip-top" title="Enter iTunes ID for getting album information">
                    <input type="button" class="red" value="Auto" onclick="search_itunes_id(document.getElementById('art_name').value,'art_itunes');"> <br>
            <label>Arttist Picture URL:</label>
            <input type="text" name="art_pic" id="art_pic" class="tiptip-bottom" title="Example: http://www.domain/URL/to_artist_picture.jpg <br>We are not support upload directly picture from computer this time." value="" > <input type="button" class="red" value="Auto" onclick="auto_update_art_pic(document.getElementById('art_name').value,'art_pic');"> <br>  
            <label>Similiar Artists:</label>
            <input type="text" name="art_similar" id="art_similar" class="tiptip-bottom" title="Example: Casting Crowns,  Matt Redman,Jeremy Camp, David Crowder<br> Enter any artist you know, separated by comma (,)" value="" > <br>
            <label>Artist Biography</label>
			<textarea id="art_bio" name="art_bio" title="Full Artist Bio" cols="50" rows="12" class="box-large wysiwyg"></textarea><BR>
            <p align=center ><br><br>
	            <input type="submit" name="submit" value="Add New Artist" >                
            </p>
            
        </form>     
    </div>
    
    <div id="s-tabs-edit">
    <?php
		if(isset($_GET['r'])) {

			$r = $helper->fast("r","1","number","",true);
			$ht = $db->fast_get("artist","`art_key`='".$r."'");	
											
			?>
		<script language="javascript" >
			 $(document).ready(function(e) {              							
             	    window.location='#s-tabs-edit-tab';
            });
		</script>            
        <form action="Javascript: void(0);" method="post" onSubmit="go_post('admin/artist/edit',this);" >
         	<div style="float:right;width:205px;border:1px solid #EBEBEB;padding:10px;">
           		<h3>Categories</h3>
                <div align=left style="float:right;width:200px;" class="catbox">
                <?php
                    echo $this->get_category();

                ?>
                </div>                
            </div>   
            
                <label for="e_art_name">Artist Name:</label>
                <input type="text" name="e_art_name" id="e_art_name" class="tiptip-right input-ok" title="Enter Aritst Name" onBlur="auto_get_seo('e_art_name','e_art_seo');artist_youtube('e_art_name','e_art_youtube');" > <br>                  
                <label for="e_art_seo">SEO base on Name:</label>
                <input type="text" name="e_art_seo" id="e_art_seo" class="tiptip-right" title="SEO for Searching" > <br>
                <label>Youtube Artist URL:</label>
                <input type="text" name="e_art_youtube" id="e_art_youtube" style="width:230px;" class="tiptip-bottom" title="Example: http://www.youtube.com/artist/Chris_Tomlin <br>We will auto update songs for this artist from youtube.<br>Leave its blank if you don't know about this URL.">
                        <input type="button" class="red" value="Verify" onclick="window.open(document.getElementById('e_art_youtube').value);"> <br>
                <label>Auto Update Songs From YouTube:</label>
                <input type="radio" name="e_art_auto_update" value="yes" class="tiptip-top" title="Auto update every weeks"> Yes 
                <input type="radio" name="e_art_auto_update" value="no"  > No   <input type="button" class="red" value="Auto Update Now" onclick="Javascript: make_loading(this);auto_update_artist(document.getElementById('e_art_name').value);">
                <br>
	            <label> Last Auto Update:  </label> <?=$ht['art_last_update'];?>              
                <div id="autoupdate"></div>
                <br />                
                <label>Status</label>
                <select name="e_art_status" id="e_art_status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>               
                </select>       <br>
            <label>iTunes Artist ID:</label>
            <input type="text" name="e_art_itunes" id="e_art_itunes" value=""  style="width:230px;" accept="" class="tiptip-top" title="Enter iTunes ID for getting album information">
                    <input type="button" class="red" value="Auto" onclick="search_itunes_id(document.getElementById('e_art_name').value,'e_art_itunes');"> <br>
            <br>
                <label>Arttist Picture URL:</label>
                <input type="text" name="e_art_pic" id="e_art_pic" class="tiptip-bottom" title="Example: http://www.domain/URL/to_artist_picture.jpg <br>We are not support upload directly picture from computer this time." value="" > <input type="button" class="red" value="Auto" onclick="make_loading(this);auto_update_art_pic(document.getElementById('e_art_name').value,'e_art_pic');"> <br>  
                <label>Similiar Artists:</label>
                <input type="text" name="e_art_similar" id="e_art_similar" class="tiptip-bottom" title="Example: Casting Crowns,  Matt Redman,Jeremy Camp, David Crowder<br> Enter any artist you know, separated by comma (,)" value="" > <br>
                <label>Artist Biography</label>
                <textarea id="e_art_bio" name="e_art_bio" title="Full Artist Bio" cols="50" rows="12" class="box-large wysiwyg"><?=un_quotes($ht['art_bio']);?></textarea><BR>
				 <label for="e_art_order">Order Number:</label>
                <input type="text" name="e_art_order" id="e_art_order" class="tiptip-right" title="Order Number, higher will show first" > <br>                
                <p align=center ><br><br>
                    <input type="submit" name="submit" value="Update Artist" >                
                </p>
                <input type="hidden" name="art_key"  value="<?=$r?>" id="art_key"  />

            </form>                 
            <? 			
				$helper->set_value("#e_art_name",$ht['art_name']);
				$helper->set_value("#e_art_seo",$ht['art_seo']);
                $helper->set_value("#e_art_itunes",$ht['art_itunes']);
				$helper->set_value("#e_art_youtube",$ht['art_youtube']);				
				$helper->set_click("input[name=e_art_auto_update][value=".$ht['art_auto_update']."]");				
				$helper->set_value("#e_art_status",$ht['art_status']);
				$helper->set_value("#e_art_pic",$ht['art_pic']);
				$helper->set_value("#e_art_similar",$ht['art_similar']);
				$helper->set_value("#e_art_order",$ht['art_order']);	
				$helper->set_checkbox_value("song_cat[]","links_cats_artist","cat_key","art_key=".$ht['art_key']);	
																							
		}
	?>
    </div>
    <!-- END Tabs content -->
	<script language="javascript">
	$(document).ready(function(e) {
        $("input[name=e_art_auto_update]").uniform();
		$.uniform.update($("input[type=checkbox]"));	
    });	
		
	</script>
</div>