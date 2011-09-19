<?php
// Variables used by required files for different pages
$page_title   = 'MusicDB';
$page_name    = 'home';

?>
<!DOCTYPE html>
<html>
    <!-- require head tag -->
    <?php require(__DIR__.'/inc/01_head.php'); ?>

    <body>

		<!-- Container -->        
		<div id="container">

            <!-- require Adminbar -->
			<?php require(__DIR__.'/inc/02_adminbar.php'); ?>                 
			<!-- Panel Outer -->
			<div id="panel-outer" class="radius">

				<!-- Panel -->
				<div id="panel" class="radius">

                    <!-- require main menu -->
                    <?php require(__DIR__.'/inc/03_menu.php'); ?>
					<!-- Content -->
					<div id="content">
                        <!-- Main Content -->
                        <table width=100% cellspacing="0" cellpadding="0" border=0 id="contenttable" >
                        <tr><td align=left valign=top width=150 >     
                         <h3 class="icon_sound" >♫ Categories</h3>
                            <div class="body-con">
                             	<?php
									echo show_categories();
								?>
                            </div>                            
                           
							
                            <h3 class="icon_artist" >Artists</h3>
                            <div class="body-con">
                             	<?php
									show_artist(60);
								?>
                            </div>  
                            <div style="text-align:center;">
                

                            </div>
                                                   
                       
                        </td>
                        <td align=left valign=top >                                   
                         	<?php
								$this->main_body();
							?>                                          
                                             
                        </td>
                        <td valign=top align=left width=300 >   
						
                        <script type="text/javascript"><!--
							google_ad_client = "pub-9011430005420496";
							/* MusicDB 300x250, created 8/7/11 */
							google_ad_slot = "3130274084";
							google_ad_width = 300;
							google_ad_height = 250;
							//-->
							</script>
							<script type="text/javascript"
							src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
						</script>
						<script type="text/javascript"><!--
							google_ad_client = "pub-9011430005420496";
							/* MusicDB 300x250, created 8/7/11 */
							google_ad_slot = "3130274084";
							google_ad_width = 300;
							google_ad_height = 250;
							//-->
							</script>
							<script type="text/javascript"
							src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
						</script>                        
                            <h3><input type="button" value="♪ Play All ♫"  onclick="Javascript:window.location='<?=_URL_?>/topsongs';"> Top Songs This Week </h3>
                            <div class="body-con">
                             <?php
							 	show_top_song(@date("YW"),15);
							 ?>
                            </div>  
<h3> <input type="button" value="♪ Store ♫"  onclick="Javascript:window.location='<?=_URL_?>/bestselling';"> Best Selling This Month</h3>
<div class="body-con" style="text-align:center;">                                
<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab" id="Player_fa852516-a5e1-4b29-8284-32a6b6ff829d"  WIDTH="250px" HEIGHT="250px"> <PARAM NAME="movie" VALUE="http://ws.amazon.com/widgets/q?rt=tf_w_mpw&ServiceVersion=20070822&MarketPlace=US&ID=V20070822%2FUS%2Ftopworson-20%2F8014%2Ffa852516-a5e1-4b29-8284-32a6b6ff829d&Operation=GetDisplayTemplate"><PARAM NAME="quality" VALUE="high"><PARAM NAME="bgcolor" VALUE="#FFFFFF"><PARAM NAME="allowscriptaccess" VALUE="always"><embed src="http://ws.amazon.com/widgets/q?rt=tf_w_mpw&ServiceVersion=20070822&MarketPlace=US&ID=V20070822%2FUS%2Ftopworson-20%2F8014%2Ffa852516-a5e1-4b29-8284-32a6b6ff829d&Operation=GetDisplayTemplate" id="Player_fa852516-a5e1-4b29-8284-32a6b6ff829d" quality="high" bgcolor="#ffffff" name="Player_fa852516-a5e1-4b29-8284-32a6b6ff829d" allowscriptaccess="always"  type="application/x-shockwave-flash" align="middle" height="250px" width="250px"></embed></OBJECT>
</div>
                              
                      
                      
                        </td>
                        </tr>
                        </table>    
					</div>
					<!-- END Content -->

                    <!-- require Footer -->
					<?php require(__DIR__.'/inc/04_footer.php'); ?>

				</div>
				<!-- END Panel -->

			</div>
			<!-- END Panel Outer -->

		</div>
		
		
	

        <!-- require Javascript -->
        <?php require(__DIR__.'/inc/05_scripts.php'); ?>

	</body>

</html>