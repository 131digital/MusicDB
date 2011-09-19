<?php
// Variables used by required files for different pages
$page_title = 'TurboAdmin - Newsletter';
$page_name  = 'newsletter';

?>
<!DOCTYPE html>
<html>

    <!-- require head tag -->
    <?php require('inc/01_head.php'); ?>

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
					<div id="content">
                        
                        <!-- Main Content -->
                        <div id="main-content">
                            
                            <!-- Send Newsletter -->
                            <h2>Send Newsletter</h2>
                            
                            <div class="body-con">
                                
                                <div class="msg-loading tcenter">Sending..</div>
                                
                                <!-- Send Newsletter form -->
                                <form action="javascript: void(0)" method="post" id="sendnewsletter-form" name="sendnewsletter-form">

                                    <ul class="align-list">
                                        <li>
                                            <label for="sendnewsletter-title">Title</label>
                                            <input type="text" id="sendnewsletter-title" name="sendnewsletter-title" class="box-xlarge" />
                                        </li>
                                        <li>
                                            <label for="sendnewsletter-content">Content</label>
                                            <textarea id="sendnewsletter-content" name="sendnewsletter-content" cols="10" rows="25" class="wysiwyg box-xlarge"></textarea>
                                        </li>
                                        <li>
                                            <label for="sendnewsletter-group">Send to</label>
                                            <select id="sendnewsletter-group" name="sendnewsletter-group">
                                                <option value="0" selected>Choose</option>
                                                <option value="1">All</option>
                                                <option value="2">Members</option>
                                                <option value="3">Premium Members</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label for="sendnewsletter-method">Method</label>
                                            <select id="sendnewsletter-method" name="sendnewsletter-method">
                                                <option value="0" selected>Choose</option>
                                                <option value="1">PHP Function</option>
                                                <option value="2">SMTP</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label for="sendnewsletter-now">Send Now?</label>
                                            <input type="checkbox" id="sendnewsletter-now" name="sendnewsletter-now" value="1" />
                                        </li>
                                        <li>
                                            <label></label>
                                            <input type="submit" value="Send" class="green" />
                                            <input type="submit" value="Save" />
                                        </li>
                                    </ul>

                                </form>
                                <!-- END Send Newsletter form -->
                                
                            </div>
                            <!-- END Send Newsletter -->
                                    
                            <!-- History -->
                            <h2>History</h2>
                            
                            <div class="body-con">
                            
                                <!-- View select and search -->
                                <div class="simple-con tleft">
                                    <select id="select-view" name="select-view">
                                        <option value="0" selected>Show 5</option>
                                        <option value="1">Show 10</option>
                                        <option value="2">Show 25</option>
                                        <option value="3">Show All</option>
                                    </select>
                                    <form action="javascript: void(0)" method="post" id="search-form" name="search-form" class="fright pos-rel">
                                        <input type="text" name="search-mails" id="search-mails" value="Keyword.." onfocus="this.value = '';" class="search-con" />
                                        <input type="submit" value="Search" id="search-btn" name="search-btn" class="grey search-con" />
                                    </form>
                                </div>

                                <!-- History table -->
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Newsletter Title</th>
                                            <th>Date Sent</th>
                                            <th>Subscribers Sent</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="javascript: void(0)">Title of newsletter</a></td>
                                            <td>01/01/2011 12:00</td>
                                            <td>9500/<strong>9500</strong></td>
                                            <td><a href="javascript: void(0)" class="tiptip-top" title="Delete"><img src="img/icon_bad.png" alt="delete" /></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript: void(0)">Title of newsletter</a></td>
                                            <td>01/01/2011 12:00</td>
                                            <td>8950/<strong>8950</strong></td>
                                            <td><a href="javascript: void(0)" class="tiptip-top" title="Delete"><img src="img/icon_bad.png" alt="delete" /></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript: void(0)">Title of newsletter</a></td>
                                            <td>01/01/2011 12:00</td>
                                            <td>7500/<strong>7500</strong></td>
                                            <td><a href="javascript: void(0)" class="tiptip-top" title="Delete"><img src="img/icon_bad.png" alt="delete" /></a></td>
                                        </tr>
                                        <tr>
                                            <td class="backcolor"><a href="javascript: void(0)">Title of newsletter</a></td>
                                            <td class="backcolor">01/01/2011 12:00</td>
                                            <td class="backcolor"><a href="javascript: void(0)" class="ared tiptip-top" title="There was a problem & the newsletter wasn't sent to all!">7186/<strong>7200</strong></a></td>
                                            <td class="backcolor"><a href="javascript: void(0)" class="tiptip-top" title="Delete"><img src="img/icon_bad.png" alt="delete" /></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript: void(0)">Title of newsletter</a></td>
                                            <td>01/01/2011 12:00</td>
                                            <td>6985/<strong>6985</strong></td>
                                            <td><a href="javascript: void(0)" class="tiptip-top" title="Delete"><img src="img/icon_bad.png" alt="delete" /></a></td>
                                        </tr>

                                    </tbody>
                                </table>

                                <!-- History pagination -->
                                <div class="simple-con pad-none">
                                    <ul class="pagination tcenter">
                                        <li><a href="javascript: void(0)" class="page radius">Previous</a></li>
                                        <li><a href="javascript: void(0)" class="page radius">1</a></li>
                                        <li><a href="javascript: void(0)" class="page radius">2</a></li>
                                        <li><span class="page-active radius">3</span></li>
                                        <li><a href="javascript: void(0)" class="page radius">4</a></li>
                                        <li>...</li>
                                        <li><a href="javascript: void(0)" class="page radius">9</a></li>
                                        <li><a href="javascript: void(0)" class="page radius">10</a></li>
                                        <li><a href="javascript: void(0)" class="page radius">Next</a></li>
                                    </ul>
                                </div>
                                <!-- END History pagination -->
                            
                            </div>
                            <!-- END History -->
                            
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

	</body>

</html>