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
                         <tr>
                          <td align=left valign=top >                                   
                         	<?php
								$this->main_body();
							?>                                          
                                             
                          </td>
                          <td valign=top align=left width=160 >
                   <OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab" id="Player_d62ba2e0-db84-4821-8b70-ccf49b64a3b4"  WIDTH="160px" HEIGHT="300px"> <PARAM NAME="movie" VALUE="http://ws.amazon.com/widgets/q?rt=tf_w_mpw&ServiceVersion=20070822&MarketPlace=US&ID=V20070822%2FUS%2Ftopworson-20%2F8014%2Fd62ba2e0-db84-4821-8b70-ccf49b64a3b4&Operation=GetDisplayTemplate"><PARAM NAME="quality" VALUE="high"><PARAM NAME="bgcolor" VALUE="#FFFFFF"><PARAM NAME="allowscriptaccess" VALUE="always"><embed src="http://ws.amazon.com/widgets/q?rt=tf_w_mpw&ServiceVersion=20070822&MarketPlace=US&ID=V20070822%2FUS%2Ftopworson-20%2F8014%2Fd62ba2e0-db84-4821-8b70-ccf49b64a3b4&Operation=GetDisplayTemplate" id="Player_d62ba2e0-db84-4821-8b70-ccf49b64a3b4" quality="high" bgcolor="#ffffff" name="Player_d62ba2e0-db84-4821-8b70-ccf49b64a3b4" allowscriptaccess="always"  type="application/x-shockwave-flash" align="middle" height="300px" width="160px"></embed></OBJECT> 
                   <script type="text/javascript"><!--
amazon_ad_tag="topworson-20"; 
amazon_ad_width="160"; 
amazon_ad_height="600"; 
amazon_color_border="FFFFFF"; 
amazon_color_logo="FFFFFF"; 
amazon_color_link="206BA2"; 
amazon_ad_logo="hide"; 
amazon_ad_link_target="new"; 
amazon_ad_border="hide"; 
amazon_ad_title="Top Worship Songs"; //--></script>
<script type="text/javascript" src="http://www.assoc-amazon.com/s/asw.js"></script>
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