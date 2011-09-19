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
        
        
<?

	required_js(
		array(	
	//	"jquery-ui-1.8.14.custom.min" => "jquery UI FULL",			
	//	"jquery.flot.min" => "Flot, jquery plugin for graphs",			
		"jquery.fullcalendar" => "FullCalendar, jquery plugin for calendar",
		"simple.modal" => "simple modal",
		"jquery.wysiwyg" => "WYSIWYG, jquery plugin for textarea wysiwyg editor",
		"jquery.tabify" => "Tabfy, jquery plugin for tabs",
		"jquery.limit" => "Limit, jquery plugin for twitter limit character",
		"jquery.tiptip"=>"Tiptip, jquery plugin for tooltips",
		"jquery.elastic"=>"Elastic, jquery plugin for auto expanding textareas",
		"jquery.uniform"=>"Uniform, jquery plugin for styling form elements ",
		"jquery.apprise"=>"Apprise, jquery plugin for modals",
		"turbo.admin.page"=>"Custom javascript code for TurboAdmin",			
		));
		
	
	
/*
<!-- Jquery library -->
<!-- You can require the jquery form googleapis.com to save bandwidth -->
<!-- <script src="<?=themes("admin/")?>http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script> -->

*/
?>
