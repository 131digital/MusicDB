 
<h3>Quick Menu</h3>
<div class="body-con">      
    <ul>
    	<li> <a href="<?=_URL_?>/admin/categories"> Music Categories</a></a>
		<li> <a href="<?=_URL_?>/admin/album"> Album / CD</a> </li>   
                
    	<li> <a href="<?=_URL_?>/admin/song/?action=addnew#s-tabs-url-tab">Add New Song</a> </li>
		<li> <a href="<?=_URL_?>/admin/artist#s-tabs-addnew-tab">Add New Artist</a> </li>   
        
        <li> <a  href="Javascript: void(0);" onclick="Javascript:search_artist();">Search Artist</a> </li>        
        <li> <a href="Javascript: void(0);" onclick="Javascript:search_song();">Search & Edit Song</a></li>
                                       
    </ul>
</div>

<br />

    
	<h3>Quick Tools</h3>
<div class="body-con">
    <ul>
     <li> <a href="<?=_URL_?>/admin/song/?action=newsong&type=update">New Songs Need Update</a></li> 
   	<li> <a href="<?=_URL_?>/admin/plugins/?action=run&name=AutoFixSongBroken" target="_blank">Auto Fix Songs Broken</a> </li>                     
     <li> <a href="<?=_URL_?>/admin/song/?action=newsong&type=inactivebroken">InActive Songs By Auto Fix</a></li>   
		<li> <a href="<?=_URL_?>/admin/song/?action=newsong&type=broken">Songs Broken</a></li> 
        <li> <a href="<?=_URL_?>/admin/song/?action=newsong&type=inactive">InActive Songs</a></li>  
		<li> <a href="<?=_URL_?>/admin/song/?action=newsong&type=inactive">Song No Categories</a></li>                    
	
    </ul>

</div>