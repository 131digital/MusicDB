<!-- Javascript code -->

<!-- Flot jquery plugin, fix for IE7-8 -->
<!--[if lte IE 8]><script src="<?=themes("admin/")?>js/excanvas.min.js"></script><![endif]-->

       <div id="osx-modal-content">
                    <div id="osx-modal-title">System Messages</div>
                    <div class="close"><a href="#" class="simplemodal-close">x</a></div>
                    <div id="osx-modal-data">
                        <div id="datax" name="datax"></div>
                        <p><button class="simplemodal-close" id="closex" >Close</button> <span></span></p><br />
                    <div id="urlre"></div>
                    </div>           
        </div> 
		<div class="msg-loading" id="modalx"><h4>Loading message</h4>Working..</div>  
        
        
        <div id="addtoplaylist"  class="msg-loading"  >	
            <input type="hidden" name="pl_songkey" id="pl_songkey" value="" />	
            <select name="addpl_key" id="addpl_key" onchange="if(this.value=='addnew') { create_new_playlist(); }if((this.value!='addnew')&&(this.value!='')) { add_song_key_to_playlist(); } ">
                <option value=""> Add To Playlist ...</option>
                <option value="addnew">[Create New]</option>        
            </select><br />
            <input type="button" class="grey" value="Create New" onclick="create_new_playlist();" />
            <input type="button" class="grey" value="Cancel" onclick="$('#addtoplaylist').fadeOut(1000);" />        
        </div>
        
        <div id="subplayer" class="msg-loading">        	
        	<div id="subname"><div id="art_info_x"></div><marquee align="left" loop="10" behavior="slide" scrollamount="1"><span id="subtitle">Listening to Our God - Chris Tomlin</span></marquee></div>
        	<div id="subbar" ></div><br />
        	<input type="button" class="tiptip-top green" title="Like this song? Buy Mp3!" value="♫ Mp3"  onclick="buysong();"   />
            <input type="button" class="tiptip-top" value="♪ Pause" onclick="pausesong(this);"   />            
            <input type="button" class="tiptip-top" value="♪ Next Song" onclick="play_nextsong();"  />
            <div id="subtime"></div>
        </div>
        
      
        
<?

	required_js(
		array(	
	//	"jquery-ui-1.8.14.custom.min" => "jquery UI FULL",			
	//	"jquery.flot.min" => "Flot, jquery plugin for graphs",			
	//	"jquery.fullcalendar" => "FullCalendar, jquery plugin for calendar",
		"simple.modal" => "simple modal",
		"jquery.wysiwyg" => "WYSIWYG, jquery plugin for textarea wysiwyg editor",
		"jquery.tabify" => "Tabfy, jquery plugin for tabs",
	//	"jquery.limit" => "Limit, jquery plugin for twitter limit character",
		"jquery.tiptip"=>"Tiptip, jquery plugin for tooltips",
	//	"jquery.elastic"=>"Elastic, jquery plugin for auto expanding textareas",
		"jquery.uniform"=>"Uniform, jquery plugin for styling form elements ",
	//	"jquery.apprise"=>"Apprise, jquery plugin for modals",
	//	"turbo.admin.page"=>"Custom javascript code for TurboAdmin",
		"jquery.raty.min"	=> "Rating Stars",
		//"jquery.color.fixed"	=> "Color Menu",
		//"jquery.easing.1.3"	=> "Dynamic Menu"		
		));
		
	
	
/*
<!-- Jquery library -->
<!-- You can require the jquery form googleapis.com to save bandwidth -->
<!-- <script src="<?=themes("admin/")?>http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script> -->

*/
?>
<script language="javascript">

    $('select').uniform();
    $('input:checkbox').uniform();
    $('input:radio').uniform();
    $('input:file').uniform(); 


    $('.tiptip-top').tipTip({maxWidth: "auto", edgeOffset: 1, delay: 100, fadeIn: 200, fadeOut: 200, defaultPosition: "top"});
    $('.tiptip-right').tipTip({maxWidth: "auto", edgeOffset: 1, delay: 100, fadeIn: 200, fadeOut: 200, defaultPosition: "right"});
    $('.tiptip-bottom').tipTip({maxWidth: "auto", edgeOffset: 1, delay: 100, fadeIn: 200, fadeOut: 200, defaultPosition: "bottom"});
    $('.tiptip-left').tipTip({maxWidth: "auto", edgeOffset: 1, delay: 100, fadeIn: 200, fadeOut: 200, defaultPosition: "left"});
	
	$("#addtoplaylist").hide();

</script>


<script type="text/javascript"> 
 
 
$(document).ready(function() {	
 
	$('#sortcolor tr').mouseover(function (){
		var id = $(this).attr("id");
	//	alert(id + " " + "trsong" + _KEY_IS_PLAYING);
		if((id != "trsong" + _KEY_IS_PLAYING)||(_KEY_IS_PLAYING=='')) {
		//	$(this).find("td").animate({ backgroundColor: "#31b8da" }, 'fast');
			$(this).addClass("trlight");
		}
		 
	}).mouseout(function () {
		var id = $(this).attr("id");
		if((id!="trsong" + _KEY_IS_PLAYING)||(_KEY_IS_PLAYING=='')) {				
		 	$(this).removeClass("trlight");
		   // $(this).find("td").animate({ backgroundColor: "#FFFFFF" }, 'fast');
		}
	});	
	
	
	$("#subplayer").css("visibility","visible");
	$("#subplayer").hide();
 
	
});
	
</script> 
<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=7125967; 
var sc_invisible=1; 
var sc_security="6fe99ca1"; 
</script>
<script type="text/javascript"
src="http://www.statcounter.com/counter/counter.js"></script>
<noscript><div class="statcounter"><a title="tumblr
tracker" href="http://statcounter.com/tumblr/"
target="_blank"><img class="statcounter"
src="http://c.statcounter.com/7125967/0/6fe99ca1/1/"
alt="tumblr tracker"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->

