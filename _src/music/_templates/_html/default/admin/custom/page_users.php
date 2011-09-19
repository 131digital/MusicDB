<?php
// Variables used by required files for different pages
$page_title   = 'TurboAdmin - Manage Users';
$page_name    = 'users';
$subpage_name = 'manage_users';

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

                        <!-- Main Content -->
                        <div id="side-content-left">
                            
                            <!-- Message -->
                            <div class="simple-con tcenter">Another content layout! This time the sidebar is on the left side.</div>
                            
                            <!-- Search box -->
                            <h3>Search users (autocomplete)</h3>
                            <div class="body-con">
                                <form action="javascript: void(0)" method="post" id="search-form" name="search-form" class="pos-rel">
                                    <input type="text" id="search-user" name="search-user" value="Search.." onfocus="this.value = '';" class="search" />
                                    <input type="submit" value="Go" id="search-btn" name="search-btn" class="grey search" />
                                </form>
                            </div>
                            <!-- END Search box -->
                            
                            <!-- Roles box -->
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="2">Roles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="backcolor tleft">Member</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                    </tr>
                                    <tr>
                                        <td class="backcolor tleft">Comment Moderator</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                    </tr>
                                    <tr>
                                        <td class="backcolor tleft">Site Moderator</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                    </tr>
                                    <tr>
                                        <td class="backcolor tleft">Site Administrator</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- END Roles box -->
                            
                            <!-- Add user Box -->
                            <h3>Quick Add User</h3>
                            <div class="body-con">
                                
                                <div class="msg-info">Forms are ready for the sidebar, too.</div>
                                
                                <form action="javascript: void(0)" method="post" enctype="multipart/form-data" id="sf-form" name="sf-form">
                                    <label for="sf-username">Username</label>
                                    <input type="text" id="sf-username" name="sf-username" />
                                    <label for="sf-email">Email</label>
                                    <input type="text" id="sf-email" name="sf-email" />
                                    <label for="sf-password">Password</label>
                                    <input type="password" id="sf-password" name="sf-password" />
                                    <label for="sf-role">Role</label>
                                    <select id="sf-role" name="sf-role">
                                        <option value="0">Member</option>
                                        <option value="1">Comment Moderator</option>
                                        <option value="2">Site Moderator</option>
                                        <option value="3" selected>Site Administrator</option>
                                    </select>
                                    <label for="sf-avatar">New avatar</label>
                                    <input type="file" id="sf-avatar" name="sf-avatar" />
                                    <p class="tcenter">
                                        <input type="submit" value="Update" id="sf-btn" name="sf-btn" />
                                    </p>
                                </form>
                                
                            </div>
                            <!-- END Add user Box -->
                            
                            <!-- Info Box -->
                            <h3>Widgets</h3>
                            <div class="body-con">
                                <p><strong>Widgets</strong> can become really useful for completing quick tasks or getting the vital information you need. Tabs in them, get them a step further!</p>
                                <p>The <strong>Twitter widget</strong> is ready for work. Enter your Twitter's app credentials and update your status right away.</p>
                            </div>
                            <!-- END Info Box -->

                        </div>
                        <!-- END Main Content -->

                        <!-- Side Content -->
                        <div id="main-content-right">

                            <!-- All Users -->
                            <h2>All Users (568.000)</h2>
                            
                            <!-- View select and search -->
                            <div class="simple-con tleft">
                                <select id="select-view" name="select-view">
                                    <option value="0">Show 5</option>
                                    <option value="1" selected>Show 10</option>
                                    <option value="2">Show 25</option>
                                    <option value="3">Show All</option>
                                </select>
                                <form action="javascript: void(0)" method="post" id="searchbig-form" name="searchbig-form" class="fright pos-rel">
                                    <input type="text" id="searchbig-users" name="searchbig-users" value="Username etc.." onfocus="this.value = '';" class="search-con" />
                                    <input type="submit" value="Search" id="searchbig-btn" name="searchbig-btn" class="grey search-con" />
                                </form>
                            </div>
                                
                            <!-- Users table -->
                            <table>
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="tbold backcolor">username1</td>
                                        <td>email1@turboadmin.template</td>
                                        <td>Firstname1</td>
                                        <td>Lastname1</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                    </tr>
                                    <tr>
                                        <td class="tbold backcolor">username2</td>
                                        <td>email2@turboadmin.template</td>
                                        <td>Firstname2</td>
                                        <td>Lastname2</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                    </tr>
                                    <tr>
                                        <td class="tbold backcolor">username3</td>
                                        <td>email3@turboadmin.template</td>
                                        <td>Firstname3</td>
                                        <td>Lastname3</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                    </tr>
                                    <tr>
                                        <td class="tbold backcolor">username4</td>
                                        <td>email4@turboadmin.template</td>
                                        <td>Firstname4</td>
                                        <td>Lastname4</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                    </tr>
                                    <tr>
                                        <td class="tbold backcolor">username5</td>
                                        <td>email5@turboadmin.template</td>
                                        <td>Firstname5</td>
                                        <td>Lastname5</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                    </tr>
                                    <tr>
                                        <td class="tbold backcolor">username6</td>
                                        <td>email6@turboadmin.template</td>
                                        <td>Firstname6</td>
                                        <td>Lastname6</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                    </tr>
                                    <tr>
                                        <td class="tbold backcolor">username7</td>
                                        <td>email7@turboadmin.template</td>
                                        <td>Firstname7</td>
                                        <td>Lastname7</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                    </tr>
                                    <tr>
                                        <td class="tbold backcolor">username8</td>
                                        <td>email8@turboadmin.template</td>
                                        <td>Firstname8</td>
                                        <td>Lastname8</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                    </tr>
                                    <tr>
                                        <td class="tbold backcolor">username9</td>
                                        <td>email9@turboadmin.template</td>
                                        <td>Firstname9</td>
                                        <td>Lastname9</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                    </tr>
                                    <tr>
                                        <td class="tbold backcolor">username10</td>
                                        <td>email10@turboadmin.template</td>
                                        <td>Firstname10</td>
                                        <td>Lastname10</td>
                                        <td><a href="javascript: void(0)" class="tiptip-top" title="Edit"><img src="img/icon_edit.png" alt="edit" /></a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- END Users table -->

                            <!-- User pagination -->
                            <ul class="pagination tcenter">
                                <li><a href="javascript: void(0)" class="page radius">Previous</a></li>
                                <li><a href="javascript: void(0)" class="page radius">1</a></li>
                                <li><span class="page-active radius">2</span></li>
                                <li><a href="javascript: void(0)" class="page radius">3</a></li>
                                <li>...</li>
                                <li><a href="javascript: void(0)" class="page radius">56.799</a></li>
                                <li><a href="javascript: void(0)" class="page radius">56.800</a></li>
                                <li><a href="javascript: void(0)" class="page radius">Next</a></li>
                            </ul>
                            <!-- END User pagination -->
                            
                            <!-- Add role -->
                            <h2>Add Role</h2>
                            
                            <div class="body-con">

                                <form action="javascript: void(0)" method="post" id="addrole-form" name="addrole-form">

                                    <fieldset>
                                        <legend>Name</legend>
                                        <ul class="align-list">
                                            <li>
                                                <label for="addrole-name">Role name <span>*</span></label>
                                                <input type="text" id="addrole-name" name="addrole-name" />
                                            </li>
                                        </ul>
                                    </fieldset>

                                    <fieldset>
                                        <legend>Member access</legend>
                                        <ul class="align-list">
                                            <li>
                                                <label>Comments section <span>*</span></label>
                                                <label for="addrole-comments-enable" class="label-auto inside">Enable</label>
                                                <input type="radio" id="addrole-comments-enable" name="addrole-comments" value="1"  />
                                                <label for="addrole-comments-disable" class="label-auto inside">Disable</label>
                                                <input type="radio" id="addrole-comments-disable" name="addrole-comments" value="2" checked />
                                            </li>
                                            <li>
                                                <label>Author section <span>*</span></label>
                                                <label for="addrole-author-enable" class="label-auto inside">Enable</label>
                                                <input type="radio" id="addrole-author-enable" name="addrole-author" value="1"  />
                                                <label for="addrole-author-disable" class="label-auto inside">Disable</label>
                                                <input type="radio" id="addrole-author-disable" name="addrole-author" value="2" checked />
                                            </li>
                                            <li>
                                                <label>Premium section <span>*</span></label>
                                                <label for="addrole-premium-enable" class="label-auto inside">Enable</label>
                                                <input type="radio" id="addrole-premium-enable" name="addrole-premium" value="1"  />
                                                <label for="addrole-premium-disable" class="label-auto inside">Disable</label>
                                                <input type="radio" id="addrole-premium-disable" name="addrole-premium" value="2" checked />
                                            </li>
                                        </ul>
                                    </fieldset>

                                    <fieldset>
                                        <legend>Administrator access</legend>
                                        <ul class="align-list">
                                            <li>
                                                <label>Comments section <span>*</span></label>
                                                <label for="addrole-commentsm-enable" class="label-auto inside">Enable</label>
                                                <input type="radio" id="addrole-commentsm-enable" name="addrole-commentsm" value="1"  />
                                                <label for="addrole-commentsm-disable" class="label-auto inside">Disable</label>
                                                <input type="radio" id="addrole-commentsm-disable" name="addrole-commentsm" value="2" checked />
                                            </li>
                                            <li>
                                                <label>Articles section <span>*</span></label>
                                                <label for="addrole-articles-enable" class="label-auto inside">Enable</label>
                                                <input type="radio" id="addrole-articles-enable" name="addrole-articles" value="1"  />
                                                <label for="addrole-articles-disable" class="label-auto inside">Disable</label>
                                                <input type="radio" id="addrole-articles-disable" name="addrole-articles" value="2" checked />
                                            </li>
                                            <li>
                                                <label>Full access <span>*</span></label>
                                                <label for="addrole-full-enable" class="label-auto inside">Enable</label>
                                                <input type="radio" id="addrole-full-enable" name="addrole-full" value="1"  />
                                                <label for="addrole-full-disable" class="label-auto inside">Disable</label>
                                                <input type="radio" id="addrole-full-disable" name="addrole-full" value="2" checked />
                                            </li>
                                        </ul>
                                    </fieldset>

                                    <ul class="align-list">
                                        <li>
                                            <label></label>
                                            <input type="submit" value="Submit" class="green" />
                                        </li>
                                    </ul>

                                </form>
                                
                            </div>
                            <!-- END Add role -->
                            
                        </div>
                        <!-- END Side Content -->

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