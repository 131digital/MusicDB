<?php
// Variables used by required files for different pages
$page_title   = 'TurboAdmin - Add User';
$page_name    = 'users';
$subpage_name = 'add_user';

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
                            
                            <!-- Messages -->
                            <div class="simple-con tcenter">This is one of the layouts with no sidebars!</div>
                            <div class="msg-info"><h4>Input & label sizes</h4>There is a selection of sizes for labels and inputs to fit your needs. Just choose the class with the size you need!</div>
                            
                            <h2>Add new user</h2>
                            
                            <div class="body-con">
                                
                                <!-- Add user form -->
                                <form action="javascript: void(0)" method="post" enctype="multipart/form-data" id="adduser-form" name="adduser-form">
                                    
                                    <!--
                                        Choose label and input sizes by adding a class to the following ul element
                                        Leave it only with the class 'align-list' for normal sizes
                                    
                                        Labels
                                            'labels-auto'   -> auto width
                                            'labels-large'  -> large size
                                            'labels-xlarge' -> extra large size
                                    
                                        Inputs
                                            'boxes-auto'   -> auto width
                                            'boxes-small'  -> small size
                                            'boxes-large'  -> large size
                                            'boxes-xlarge' -> extra large size
                                    
                                        You can have the same effect by adding the following classes to the element you like individually 
                                    
                                        Labels
                                            'label-auto'   -> auto width
                                            'label-large'  -> large size
                                            'label-xlarge' -> extra large size
                                    
                                        Inputs
                                            'box-auto'   -> auto width
                                            'box-small'  -> small size
                                            'box-large'  -> large size
                                            'box-xlarge' -> extra large size
                                    
                                    -->
                                    <!-- List used for alignment -->
                                    <ul class="align-list">
                                        <li>
                                            <label for="adduser-username">Username <span>*</span></label>
                                            <input type="text" id="adduser-username" name="adduser-username" />
                                            <span class="msg-form-info">Alphanumeric characters only!</span>
                                        </li>
                                        <li>
                                            <label for="adduser-email">Email <span>*</span></label>
                                            <input type="text" id="adduser-email" name="adduser-email" />
                                        </li>
                                        <li>
                                            <label for="adduser-password">Password <span>*</span></label>
                                            <input type="password" id="adduser-password" name="adduser-password" />
                                            <span class="msg-form-info">At least 6 characters!</span>
                                        </li>
                                        <li>
                                            <label for="adduser-password2">Repeat password <span>*</span></label>
                                            <input type="password" id="adduser-password2" name="adduser-password2" />
                                        </li>
                                        <li>
                                            <label for="adduser-firstname">Firstname</label>
                                            <input type="text" id="adduser-firstname" name="adduser-firstname" />
                                        </li>
                                        <li>
                                            <label for="adduser-lastname">Lastname</label>
                                            <input type="text" id="adduser-lastname" name="adduser-lastname" />
                                        </li>
                                        <li>
                                            <label for="adduser-info">Other info</label>
                                            <textarea id="adduser-info" name="adduser-info" class="box-large" cols="100" rows="12"></textarea>
                                        </li>
                                        <li>
                                            <label for="adduser-birthdate">Birth date</label>
                                            <input type="text" id="adduser-birthdate" name="adduser-birthdate" class="box-small datepicker" />
                                        </li>
                                        <li>
                                            <label>Gender</label>
                                            <label for="adduser-male" class="label-auto inside">Male</label>
                                            <input type="radio" id="adduser-male" name="adduser-gender" value="1" />
                                            <label for="adduser-female" class="label-auto inside">Female</label>
                                            <input type="radio" id="adduser-female" name="adduser-gender" value="2" />
                                        </li>
                                        <li>
                                            <label for="adduser-file">Upload avatar</label>
                                            <input type="file" id="adduser-file" name="adduser-file"/>
                                        </li>
                                        <li>
                                            <label for="adduser-role">Role <span>*</span></label>
                                            <select id="adduser-role" name="adduser-role">
                                                <option value="0" selected>Member</option>
                                                <option value="1">Comment Moderator</option>
                                                <option value="2">Site Moderator</option>
                                                <option value="3">Site Administrator</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label for="adduser-active">Activate account?</label>
                                            <input type="checkbox" id="adduser-active" name="adduser-active" value="1" />
                                        </li>
                                        <li>
                                            <label></label>
                                            <input type="submit" value="Submit" class="green" />
                                            <input type="submit" value="Clear all" class="red" onclick="this.form.reset();" />
                                        </li>
                                    </ul>
                                    
                                </form>
                                <!-- END Add user form -->
                                
                            </div>
                            
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