<?php
// Variables used by required files for different pages
$page_title = 'TurboAdmin - Dashboard';
$page_name  = 'index';

?>
<!DOCTYPE html>
<html>

    <!-- require head tag -->
    <?php require('inc/01_head.php'); ?>

    <!--
        If you would like to change the layout of TurboAdmin just add one of the following classes to body element
        
        Fixed layout + Fixed Adminbar: 'fixed-adminbar'
        Fluid layout: 'fluid'
        Fluid layout + Fixed Adminbar: 'fluid-fixed-adminbar'
    
        In PHP version you can change the layout style from the inc/01_head.php
    -->
    <body<?php if ($turboadmin_layout) echo ' class="'.$turboadmin_layout.'"'; ?>>

		<!-- Container -->
		<div id="container">

            <!-- require Adminbar -->
			<?php require('inc/02_adminbar.php'); ?>

			<!-- Panel Outer -->
			<div id="panel-outer" class="radius">

				<!-- Panel -->
				<div id="panel" class="radius">

                    <!-- require main menu -->
                    <?php require('inc/03_menu.php'); ?>

					<!-- Content -->
					<div id="content" class="clearfix">
                        
                        <!-- Sidebar -->
                        <div id="side-content-right">
                            
                            <!-- Message -->
                            <div class="simple-con tcenter">This is one of the layouts with a right sidebar.</div>
                            
                            <!-- Search box -->
                            <h3>Search</h3>
                            <div class="body-con">
                                <form action="javascript: void(0)" method="post" id="search-form" name="search-form" class="pos-rel">
                                    <input type="text" id="search-keyword" name="search-keyword" value="Search.." onfocus="this.value = '';" class="search" />
                                    <input type="submit" value="Go" id="search-btn" name="search-btn" class="grey search" />
                                </form>
                            </div>
                            <!-- END Search box -->
                            
                            <!-- Updates & Notifications -->
                            
                            <!-- Sidebar tabs -->
                            <ul id="s-tabs" class="content-tabs clearfix">
                                <li class="active"><a href="#s-updates">Updates</a></li>
                                <li><a href="#s-notifications">Notifications</a></li>
                            </ul>
                            <!-- END Sidebar tabs -->

                            <div class="body-con">
                                
                                <!-- Tabs content -->
                                <div id="s-updates">
                                    
                                    <div class="msg-alert"><h6>16/05/2011 15:00</h6>New update is available for comments plugin! <br/><a href="javascript: void(0)">Update now</a></div>
                                    <div class="msg-ok enable-close"><h6>15/04/2011 13:06</h6>System update completed!</div>
                                    <div class="msg-error enable-close"><h6>15/04/2011 13:05</h6>There was a problem with the system update, restarting..</div>
                                    <div class="msg-info enable-close"><h6>12/04/2011 09:00</h6>Some updates are pending..</div>
                                    
                                </div>
                                
                                <div id="s-notifications">
                                    
                                    <div class="msg-loading">Loading notifications..</div>
                                    <div class="msg-alert enable-close"><h6>11/05/2011 10:00</h6>FTP status in server #5 is unknown!</div>
                                    <div class="msg-info enable-close"><h6>05/05/2011 11:00</h6>350 new users registered since your last visit!</div>
                                    <div class="msg-info enable-close"><h6>01/05/2011 10:30</h6>Welcome to your admin panel!</div>
                                    
                                </div>
                                <!-- END Tabs content -->

                            </div>
                            <!-- END Updates & Notifications -->
                            
                            <!-- Quick user statistics -->
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="2">Quick User Stats</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="backcolor tleft">Users</td>
                                        <td class="tright">568.000</td>
                                    </tr>
                                    <tr>
                                        <td class="backcolor tleft">Females</td>
                                        <td class="tright">47%</td>
                                    </tr>
                                    <tr>
                                        <td class="backcolor tleft">Males</td>
                                        <td class="tright tbold">53%</td>
                                    </tr>
                                    <tr>
                                        <td class="backcolor tcenter tbold" colspan="2">Ages</td>
                                    </tr>
                                    <tr>
                                        <td class="backcolor tleft">&lt; 25</td>
                                        <td class="tright">15%</td>
                                    </tr>
                                    <tr>
                                        <td class="backcolor tleft">26 - 35</td>
                                        <td class="tright tbold">35%</td>
                                    </tr>
                                    <tr>
                                        <td class="backcolor tleft">36 - 45</td>
                                        <td class="tright">28%</td>
                                    </tr>
                                    <tr>
                                        <td class="backcolor tleft">46 - 55</td>
                                        <td class="tright">17%</td>
                                    </tr>
                                    <tr>
                                        <td class="backcolor tleft">&gt; 56</td>
                                        <td class="tright">5%</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- END Quick user statistics -->
                            
                            <!-- Info Box -->
                            <h3>The Template</h3>
                            <div class="body-con">
                                <p><strong>TurboAdmin</strong> designed and developed with the developer and the end user in mind.</p>
                                <p>The <strong>UI</strong> and the <strong>code</strong> behind it, are clean and professional.</p>
                            </div>
                            <!-- END Info Box -->
                            
                        </div>
                        <!-- END Sidebar -->
                        
                        <!-- Main Content -->
                        <div id="main-content-left">
                            
                            <!-- Welcome -->
                            <h2>Hi Admin and welcome!</h2>
                            
                            <div class="body-con tcenter">Welcome to your admin panel, <strong>TurboAdmin</strong>! Feel free to discover the possibilities!</div>
                            <!-- END Welcome -->
                            
                            <!-- Statistics example with Flot plugin -->
                            <h2>Statistics (Visits)</h2>

                            <div class="body-con">
                                <div id="flot-custom" class="flot-con"></div>
                            </div>
                            <!-- END Statistics example with Flot plugin -->

                            <!-- Calendar example with Fullcalendar plugin -->
                            <h2>Calendar</h2>

                            <div class="body-con">
                                <div id="fullcalendar"></div>
                            </div>
                            <!-- END Calendar example with Fullcalendar plugin -->
                            
                        </div>
                        <!-- END Main Content -->
                        
					</div>
					<!-- END Content -->

                    <!-- require Footer -->
					<?php require('inc/04_footer.php'); ?>

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
        <?php require('inc/05_scripts.php'); ?>
        
        <script>            
            $(function(){
                /* Initialize Flot */
                // for advanced usage and customization you can check out the documentation and examples at http://code.google.com/p/flot/
                var d1 = [ [1, 3400], [2, 14000], [3, 30000], [4, 35000], [5, 29000], [6, 58000], [7, 75000],
                        [8, 82000], [9, 92000], [10, 100000], [11, 125000], [12, 134000] ]

                // Visits statistics
                $.plot($("#flot-custom"), [
                    {
                        data: d1,
                        lines: {show: true, fillColor: '#FFFFFF', fill: 1},
                        points: {show: true}
                    }
                ], {
                    xaxis: {
                        ticks: [[1, "Jan"], [2, "Feb"], [3, "Mar"], [4, "Apr"], [5, "May"], [6, "Jun"], [7, "Jul"],
                                   [8, "Aug"], [9, "Sep"], [10, "Oct"], [11, "Nov"], [12, "Dec"]]
                    },
                    yaxis: {
                        ticks: 10,
                        min: 0
                    },
                    grid: {
                        backgroundColor: {colors: ["#FFFFFF", "#EEEEEE"]}
                    }
                });
                
            })
        </script>

	</body>

</html>