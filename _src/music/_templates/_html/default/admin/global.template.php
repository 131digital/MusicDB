<?php
// Variables used by required files for different pages
$page_title   = 'TurboAdmin - Articles';
$page_name    = 'articles';

?>
<!DOCTYPE html>
<html>
    <!-- require head tag -->
    <?php require(__DIR__.'/inc/01_head.php'); ?>

    <body<?php if ($turboadmin_layout) echo ' class="'.$turboadmin_layout.'"'; ?>>

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
                        <div id="side-content-left">
                            <?php
								$this->sidebar();
							?>                          
                        </div>
                        <!-- END Main Content -->
                        
                        <!-- Main Content -->
                        <div id="main-content-right">
                            
                            <?php
								$this->main_html();
							?>
                            
                        </div>
                        <!-- END Main Content -->

					</div>
					<!-- END Content -->

                    <!-- require Footer -->
					<?php require(__DIR__.'/inc/04_footer.php'); ?>

				</div>
				<!-- END Panel -->

			</div>
			<!-- END Panel Outer -->

		</div>
		<!-- END Container -->

		<!-- Push -->
		<div class="push"></div>
		<!-- END Push -->

        <!-- require Javascript -->
        <?php require(__DIR__.'/inc/05_scripts.php'); ?>

	</body>

</html>