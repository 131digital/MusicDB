<script src="{URL}/themes/global/js/jquery.nivo.slider.pack.js"></script>  
<link rel="stylesheet" href="{URL}/themes/global/css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{URL}/themes/global/css/nivo/pascal/pascal.css" type="text/css" media="screen" />
<style>
#slider {
    position:relative;
    width:463px; /* Change this to your images width */
    height:233px; /* Change this to your images height */
    background:url({URL}/themes/global/img/loading.gif) no-repeat 50% 50%;
}
#slider img {
    position:absolute;
    top:0px;
    left:0px;
    display:none;
}
#slider a {
    border:0;
    display:block;
}
</style>
<div class="slider-wrapper theme-pascal tiptip-top" title="† Bible Promises! Have A Blessing Day, my friend ♫">
    <div class="ribbon"></div>
    <div id="slider">
    {slider_nivo}
    </div>
    
</div>
<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider({
        effect:'random', // Specify sets like: 'fold,fade,sliceDown'
        slices:15, // For slice animations
        boxCols: 8, // For box animations
        boxRows: 4, // For box animations
        animSpeed:3000, // Slide transition speed
        pauseTime:5000, // How long each slide will show
        startSlide:0, // Set starting Slide (0 index)
        directionNav:false, // Next & Prev navigation
        directionNavHide:true, // Only show on hover
        controlNav:false, // 1,2,3... navigation
        controlNavThumbs:false, // Use thumbnails for Control Nav
        controlNavThumbsFromRel:false, // Use image rel for thumbs
        controlNavThumbsSearch: '.jpg', // Replace this with...
        controlNavThumbsReplace: '_thumb.jpg', // ...this in thumb Image src
        keyboardNav:false, // Use left & right arrows
        pauseOnHover:false, // Stop animation while hovering
        manualAdvance:false, // Force manual transitions
        captionOpacity:0.8, // Universal caption opacity
        prevText: 'Prev', // Prev directionNav text
        nextText: 'Next', // Next directionNav text
        beforeChange: function(){}, // Triggers before a slide transition
        afterChange: function(){}, // Triggers after a slide transition
        slideshowEnd: function(){}, // Triggers after all slides have been shown
        lastSlide: function(){}, // Triggers when last slide is shown
        afterLoad: function(){} // Triggers when slider has loaded
    });
});
</script>

<div style="margin-top:-20px;">
<h3 class="icon_sound">♫ Popular Artists</h3>
{popular_artist}
<div style="text-align:center;">
	<script type="text/javascript"><!--
    amazon_ad_tag = "topworson-20"; amazon_ad_width = "468"; amazon_ad_height = "60"; amazon_ad_link_target = "new"; amazon_ad_border = "hide";//--></script>
    <script type="text/javascript" src="http://www.assoc-amazon.com/s/ads.js"></script>
</div>
{popular_song}
</div>
