<script>
var art_bio = "";
var sub_art_bio = "";
$(document).ready(function(e) {
    var art_pic = "{art_pic}";
	if(art_pic=="") {
		auto_update_art_pic("{art_name}","artist_img", "morethumb","{art_key}");
	}
	art_bio = $("#art-bio").html();
	sub_art_bio = art_bio.substr(art_bio,650);
	$("#art-bio").html(sub_art_bio + "...");
	call_thumb();	
	
	$("#music-tabs").tabify();	
});

</script>
<ul id="music-tabs" class="content-tabs clearfix">
    <li class="active "><a href="#music-tabs-bio" class="upperfirst">About {art_name}</a></li>
    <li><a href="#music-tabs-gallery" onclick='auto_update_art_pic("{art_name}","artist_img", "morethumb");'>More Pictures</a></li>   
</ul>
<div id="music-tabs-bio">
    <div class="body-con" >
          <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style" style="float:right;">
            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a><a class="addthis_button_tweet"></a><a class="addthis_button_google_plusone"></a>
            </div>
            <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e4150d05b2c435d"></script>
            <!-- AddThis Button END -->   
                
        <div class="div-art-pic"><img src="{art_pic}" id="artist_img" name="artist_img"  hspace=10 vspace=10 class="xbox art-pic" style="position:relative;top:-10px;"/></div>            
        <div class="art-bio" id="art-bio">            
        {art_bio}			
		</div>     
        <div class="art-more" id="art-more"><a href="Javascript:void(0);" onclick="$('#art-bio').html(art_bio);$(this).hide();">Read more</a>
		<script type="text/javascript"><!--
				google_ad_client = "pub-9011430005420496";
				/* MusicDB 468x15, created 8/7/11 */
				google_ad_slot = "2389350559";
				google_ad_width = 468;
				google_ad_height = 15;
				//-->
            </script>
            <script type="text/javascript"
            src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
            </script></div>   
    </div>
</div>
<div style="text-align:center;">
<script type='text/javascript'>
var amzn_wdgt={widget:'Carousel'};
amzn_wdgt.tag='topworson-20';
amzn_wdgt.widgetType='SearchAndAdd';
amzn_wdgt.keywords='{art_name}';
amzn_wdgt.browseNode='301668';
amzn_wdgt.title='{art_name} Popular Album';
amzn_wdgt.width='500';
amzn_wdgt.height='175';
amzn_wdgt.marketPlace='US';
amzn_wdgt.shuffleProducts=true;
amzn_wdgt.showBorder=false;
</script>
<script type='text/javascript' src='http://wms.assoc-amazon.com/20070822/US/js/swfobject_1_5.js'>
</script>
</div>
<div id="music-tabs-gallery">
    <div class="body-con" >
    <div id="morethumb" ></div>
    </div>
</div>

