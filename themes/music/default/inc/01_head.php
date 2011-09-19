<?php

$page_title = "Top 100 Worship Songs - Christian Music - Songs Lyrics - Guitar Chord";


?>

<head>
    <title><?=get_page_seo("title")?> - <?php echo $page_title; ?></title>
    <meta name="keywords" content="top 10 christian songs, <?=get_page_seo("keyword")?>, christiand band, bands, songs, jesus love, god love, song lyrics, christian lyrics, worship lyrics, lyric, worship lyric, guitar choird, worship chord, song chord, christian song, church music, worship, jesus, church, top christian music, music, christian, gospel, bible, radio, internet radio, billboard christian, listen christian music free, download christian music"/> 
    <meta name="description" content="Welcome to Top10ChristianSongs.com, <?=get_page_seo("desc")?>. Top 10 Christian song, update music daily, listen FREE! Come and vote for which song you like. You also can find Song Lyrics And Guitar Chords here."/> 
    <meta name="google-site-verification" content="SV2dWPWv5NYrZAADFa6usOLarOnjKPdBmaAQGv0jwKM" />
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />     
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js"></script>
    <link rel="stylesheet" href=" http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/themes/ui-lightness/jquery-ui.css" type="text/css" >
   
    <script language="javascript" >
		var _URL = "<?=_URL_?>";
		var AppID = "<?=$config['API']['Bing']?>";
		var _THEME = "<?=_URL_."/themes/".$config['script']."/".$config['themes']?>";
		<?php
			if(isset($helper->data['username'])) {
				echo "var session_username='".$helper->data['username']."';";
				echo "var session_id='".$helper->data['id']."';";								
			} else {
				echo "var session_username='';";
				echo "var session_id='';";				
			}
		?>
	</script>
        
    <?php
		required_css(
			array(			
		//	"jquery-ui-1.8.11.custom" => "jQuery",
		//	"jquery.fullcalendar" => "full calendar",
		//	"jquery.fullcalendar.print" => "full calendar print",
			"jquery.tiptip" => "tooltip",
			"jquery.wysiwyg" => "text area",
			"jquery.uniform" => "styling form",
		//	"jquery.apprise" => "auto textarea",
			"osx" => "osx",
			"jquery.fancybox-1.3.4"	=> "Fancy Box"
		
		),
			array(
		//	"jquery.fullcalendar.print" => "print"
		));
		
		required_js(
			array(
		//	"excanvas.min" => "Flot jQuery fix IE8",
		//	"jquery-1.5.2.min" => "jQuery",	
		//	"jquery-ui-1.8.11.custom.min" => "query UI, used for FullCalendar, Autocomplete & Datepicker",	
			"osx" => "osx",
			"jquery.fancybox-1.3.4.pack"	=> "Fancy Box",
			"global.code"	=>	"global javascript function"
		));		
		
		required_pages_js();

	?>
  <link rel="stylesheet" href="<?=themes("css/style.css")?>" type="text/css" >  
  <link rel="stylesheet" href="<?=themes("css/turbo.style.css")?>" type="text/css" >
  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-9534072-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>