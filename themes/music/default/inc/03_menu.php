<div class="subpage">
<ul class=left >
	<li><a href="<?=_URL_?>/home" class="tiptip-bottom" title="Christian Songs Home">Home</a></li>
    <li><a href="#" onclick="onair();" class="tiptip-bottom" title="Live Music ♫ ♪ Click and select channel">♫ On Air ♪</a></li>
	<li><a href="<?=_URL_?>/topsongs" class="tiptip-bottom" title="Top Christian Songs This Week">Top 100 Songs</a></li>    
	<li><a href="<?=_URL_?>/latestsongs" class="tiptip-bottom" title="Latest Songs Update Daily">Latest Songs</a></li>        
	<li><a href="<?=_URL_?>/myplaylist"class="tiptip-bottom" title="You create your own playlist" >My Playlist</a></li>     
	<li><a href="<?=_URL_?>/bestselling"class="tiptip-bottom" title="Looking for Best Selling Mp3, and Album?" >Best Selling Albums</a></li>   
	<li><a href="<?=_URL_?>/bestselling/book-bible/25"class="tiptip-bottom" title="Visit Our Store To buy Book, Bible, CD and DVD" >Book & Bible</a></li>   
    <li><a href="http://www.amazon.com/gp/search?rh=i%3Adigital-music-ss%2Cn%3A%21195211011%2Cn%3A%21251258011%2Cn%3A318768011%2Cn%3A334896011%2Cn%3A334897011%2Cn%3A624905011&bbn=334897011&ie=UTF8&qid=1313399374&rnid=624868011?ie=UTF8&tag=topworson-20&linkCode=ur2&camp=1789&creative=9325"   target=_blank class="tiptip-top" title="Free Songs Everyday For You!<br>From Amazon Mp3, You can download to your phone, laptop, or burn to CD.">Free Songs</a>       
          	                
</ul><img src="http://www.assoc-amazon.com/e/ir?t=topworson-20&l=ur2&o=1" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
<ul class=right >
	<?php
	if(!isset($helper->data['username'])) {
	?>
        <li><a href="<?=_URL_?>/register" class="tiptip-bottom" title="Sign Up an Account - Ez!">Register</a></li>
        <li><a href="<?=_URL_?>/login" class="tiptip-bottom" title="Login to your account" onclick="request_login_box();return false;">Login</a></li>              	                
    <?php 
	} else {
	?>
        <li><a href="<?=_URL_?>/myaccount">My Account</a></li>
        <li><a href="<?=_URL_?>/logout" >Logout</a></li>        
    <?php
	}
	?>
</ul>
</div>