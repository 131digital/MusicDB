<?php

/* Choose Turboadmin layout
 * 
 * ''                     => leave empty for default fixed layout
 * 'fluid'                => fluid layout
 * 'fixed-adminbar'       => fixed layout + fixed adminbar
 * 'fluid-fixed-adminbar' => fluid layout + fixed adminbar
 * 
 */
$turboadmin_layout = '';

?>

<head>
    <title><?php echo $page_title; ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=themes("admin/img/favicon.ico")?>" />
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        
    <?php
		required_css(
			array(
			"turbo.admin.style" => "Admin Styles",
			"jquery-ui-1.8.11.custom" => "jQuery",
			"jquery.fullcalendar" => "full calendar",
			"jquery.fullcalendar.print" => "full calendar print",
			"jquery.tiptip" => "tooltip",
			"jquery.wysiwyg" => "text area",
			"jquery.uniform" => "styling form",
			"jquery.apprise" => "auto textarea",
			"osx" => "osx"
		),
			array(
			"jquery.fullcalendar.print" => "print"
		));
		
		required_js(
		array(
		"excanvas.min" => "Flot jQuery fix IE8",
	//	"jquery-1.5.2.min" => "jQuery",	
		"jquery-ui-1.8.11.custom.min" => "query UI, used for FullCalendar, Autocomplete & Datepicker",	
		"osx" => "osx"
		));		
		
		required_pages_js("tmp");

	?>
 	
</head>