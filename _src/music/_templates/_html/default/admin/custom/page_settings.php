<?php
// Variables used by required files for different pages
$page_title = 'TurboAdmin - Settings';
$page_name  = 'settings';

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
					<div id="content" class="clearfix">

                        <!-- Sidebar -->
                        <div id="side-content-right">
                            
                            <!-- Alert message -->
                            <div class="msg-alert tcenter">The site is in offline mode!</div>
                            
                            <!-- Maintenance Box -->
                            <h3>Maintenance</h3>
                            <div class="body-con">
                                
                                <div class="msg-info">The textarea will auto expand as you write!</div>
                                
                                <form action="javascript: void(0)" method="post" id="mm-form" name="mm-form">    
                                    <label for="mm-msg">Offline message:</label>
                                    <textarea id="mm-msg" name="mm-msg" cols="10" rows="1" class="elastic"></textarea>
                                    <label for="mm-offline" class="label-auto">Offline mode</label>
                                    <input type="checkbox" id="mm-offline" name="mm-offline" value="1" checked />
                                    <p class="tcenter">
                                        <button onclick="apprise('Are you sure?', {'verify':true});" class="grey">Update</button>
                                    </p>
                                </form>
                            </div>
                            <!-- END Maintenance Box -->
                            
                            <!-- Admin Profile Box -->
                            <h3>Quick Edit Profile</h3>
                            <div class="body-con">
                                
                                <div class="msg-info tcenter">Check the tooltips!</div>
                                
                                <form action="javascript: void(0)" method="post" enctype="multipart/form-data" id="mp-form" name="mp-form">
                                    <p class="simple-con tcenter">
                                        <img src="img/avatar.jpg" alt="avatar" class="tiptip-top" title="This is your avatar" />
                                    </p>
                                    <label for="mp-avatar">New avatar</label>
                                    <input type="file" id="mp-avatar" name="mp-avatar" />
                                    <label for="mp-username">Username</label>
                                    <input type="text" id="mp-username" name="mp-username" value="Admin" class="tiptip-top tbold inactive" title="This is an inactive input!" readonly />
                                    <label for="mp-email">Email</label>
                                    <input type="text" id="mp-email" name="mp-email" value="admin@turboadmin.template" class="tiptip-top" title="Enter your email" />
                                    <label for="mp-password">Password</label>
                                    <input type="password" id="mp-password" name="mp-password" class="tiptip-top" title="Enter a password to change your current one" />
                                    <label for="mp-firstname">Firstname</label>
                                    <input type="text" id="mp-firstname" name="mp-firstname" value="John" class="tiptip-top" title="Enter your firstname" />
                                    <label for="mp-lastname">Lastname</label>
                                    <input type="text" id="mp-lastname" name="mp-lastname" class="tiptip-top" title="Enter your lastname" />
                                    <label for="mp-role">Role</label>
                                    <select id="mp-role" name="mp-role" class="tiptip-top" title="Change your role but be careful not to lose your admin access!">
                                        <option value="0">Member</option>
                                        <option value="1">Comment Moderator</option>
                                        <option value="2">Site Moderator</option>
                                        <option value="3" selected>Site Administrator</option>
                                    </select>
                                    <p class="tcenter">
                                        <input type="submit" value="Update" id="mp-btn" name="mp-btn" class="green" />
                                    </p>
                                </form>
                            </div>
                            <!-- END Admin Profile Box -->
                            
                            <!-- Info Box -->
                            <h3>Forms</h3>
                            <div class="body-con">
                                <p><strong>Forms</strong> are designed to work out of the box.</p>
                                <p>You can create easy and fast the <strong>forms you want</strong> and they will look great in every section (<strong>main content</strong>, <strong>sidebar</strong> and <strong>widgets</strong>).</p>
                                <p><strong>Auto expanding</strong>, <strong>character limit</strong>, <strong>wysiwyg editor</strong>, <strong>tooltips</strong>, <strong>datepicker</strong>, <strong>modals</strong>, <strong>autocomplete</strong>, <strong>uniform styling</strong> and <strong>custom style classes</strong> complete the forms package <strong>TurboAdmin</strong> has to offer.</p>
                            </div>
                            <!-- END Info Box -->
                            
                        </div>
                        <!-- END Sidebar -->
                        
                        <!-- Main Content -->
                        <div id="main-content-left">
                            
                            <!-- Status -->
                            <h2>Status</h2>
                            <div class="body-con">    
                                <div class="msg-ok"><h4>Comments</h4> Section is online!</div>
                                <div class="msg-ok"><h4>Premium</h4> Section is online!</div>
                                <div class="msg-error"><h4>Author</h4> Section is offline!</div>
                                <div class="msg-alert"><h4>Moderator</h4> Section status is unknown!</div>
                            </div>
                            <!-- END Status -->

                            <!-- Website Metadata Form -->
                            <form action="javascript: void(0)" method="post" id="metadata-form" name="metadata-form">

                                <fieldset>
                                    <legend>Website Metadata</legend>
                                    <ul class="align-list">
                                        <li>
                                            <label for="metadata-title">Title <span>*</span></label>
                                            <input type="text" id="metadata-title" name="metadata-title" value="My Website" />
                                            <span class="msg-form-info">The title of your website</span>
                                        </li>
                                        <li>
                                            <label for="metadata-keywords">Keywords <span>*</span></label>
                                            <input type="text" id="metadata-keywords" name="metadata-keywords" value="cool, great, unique, wonderful" />
                                        </li>
                                        <li>
                                            <label for="metadata-author">Author <span>*</span></label>
                                            <input type="text" id="metadata-author" name="metadata-author" value="Author's name" />
                                        </li>
                                        <li>
                                            <label for="metadata-description">Description <span>*</span></label>
                                            <textarea id="metadata-description" name="metadata-description" rows="6" cols="20">This is your site's description!</textarea>
                                            <span class="msg-form-info">Describe your website</span>
                                        </li>
                                        <li>
                                            <label for="metadata-robots">Robots <span>*</span></label>
                                            <select id="metadata-robots" name="metadata-robots">
                                                <option value="0" selected>Allow</option>
                                                <option value="1">Disallow</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label></label>
                                            <input type="submit" id="metadata-btn" name="metadata-btn" value="Update" />
                                        </li>
                                    </ul>
                                </fieldset>

                            </form>
                            <!-- END Website Metadata Form -->

                            <!-- Website Theme Form -->
                            <form action="javascript: void(0)" method="post" id="theme-form" name="theme-form">

                                <fieldset>
                                    <legend>Website Theme</legend>
                                    <ul class="align-list">
                                        <li>
                                            <label>Selected theme</label>
                                            <div class="simple-con dis-inline tbold">Aqua</div>
                                        </li>
                                        <li>
                                            <label for="theme-new">Choose new theme:</label>
                                            <select id="theme-new" name="theme-new">
                                                <option value="0" selected>Dark</option>
                                                <option value="1">Grey</option>
                                                <option value="2">Summer glow</option>
                                                <option value="3">Forest</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label></label>
                                            <input type="submit" id="theme-btn" name="theme-btn" value="Update Theme" class="green" />
                                        </li>
                                    </ul>
                                </fieldset>

                            </form>
                            <!-- END Site Theme Form -->

                            <!-- Admin Layout Form -->
                            <form action="javascript: void(0)" method="post" id="layout-form" name="layout-form">

                                <fieldset>
                                    <legend>Admin Panel Layout</legend>
                                    <ul class="align-list">
                                        <li>
                                            <label for="layout-new">Choose new layout:</label>
                                            <select id="layout-new" name="layout-new">
                                                <option value="0" selected>1 column</option>
                                                <option value="1">2 columns</option>
                                                <option value="2">3 columns</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label for="layout-fixed-adminbar">Fixed adminbar?</label>
                                            <input type="checkbox" id="layout-fixed-adminbar" name="layout-fixed-adminbar" value="1" />
                                        </li>
                                        <li>
                                            <label for="layout-fluid">Fluid?</label>
                                            <input type="checkbox" id="layout-fluid" name="layout-fluid" value="1" />
                                        </li>
                                        <li>
                                            <label></label>
                                            <input type="submit" id="layout-btn" name="layout-btn" value="Update Admin Layout" class="grey" />
                                        </li>
                                    </ul>
                                </fieldset>

                            </form>
                            <!-- END Admin Layout Form -->
                            
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