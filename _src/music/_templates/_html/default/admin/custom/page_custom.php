<?php
// Variables used by required files for different pages
$page_title = 'TurboAdmin - Custom';
$page_name  = 'custom';

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

                            <!-- Welcome, a simple box -->
                            <div class="simple-con tcenter">Customize <strong>your page</strong>!</div>

                            <!-- Search box -->
                            <h3>Search with autocomplete</h3>
                            <div class="body-con">
                                <form action="javascript: void(0)" method="post" id="search-form" name="search-form" class="pos-rel">
                                    <input type="text" id="search-keyword" name="search-keyword" value="Search.." onfocus="this.value = '';" class="search" />
                                    <input type="submit" value="Go" id="search-btn" name="search-btn" class="grey search" />
                                </form>
                            </div>
                            <!-- END Search box -->

                            <!-- Updates box -->
                            <h3>Updates</h3>
                            <div class="body-con">
                                <!-- add the class 'enable-close' and you can hide the element on click -->
                                <div class="msg-alert enable-close">This is an alert message, it could be used for an update notification! Also, this message can be closed on click, by adding a class to it.</div>
                                <div class="msg-info">350 new users registered since your last visit!</div>
                            </div>
                            <!-- END Updates -->

                            <!-- Modals box -->
                            <h3>Modals</h3>
                            <div class="body-con tcenter">
                                <!-- for advanced usage of apprise jquery plugin you can check out at http://thrivingkings.com/apprise/ -->
                                <button class="grey" onclick="apprise('Hi there!');">Simple message</button>
                                <button onclick="apprise('Continue?', {'confirm':true});">Confirm message</button>
                                <button onclick="apprise('Are you sure?', {'verify':true});">Yes or no?</button>
                                <button class="red" onclick="apprise('I am an animated message!', {'animate':true});">Animated message?</button>
                                <button class="green" onclick="apprise('What\'s your name?', {'input':true});">Message with input</button>
                            </div>
                            <!-- END Modals box -->

                            <!-- Table box -->
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="2">Quick Statistics</th>
                                    </tr>
                                    <tr>
                                        <th class="tleft">Visits</th>
                                        <th class="tright">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="backcolor tleft">Today</td>
                                        <td class="tright">5453</td>
                                    </tr>
                                    <tr>
                                        <td class="backcolor tleft">Yesterday</td>
                                        <td class="tright">4200</td>
                                    </tr>
                                    <tr>
                                        <td class="backcolor tleft">This month</td>
                                        <td class="tright">134000</td>
                                    </tr>
                                    <tr>
                                        <td class="backcolor tleft">Last month</td>
                                        <td class="tright">125000</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- END Table box -->

                            <!-- Tabs Box -->
                            
                            <!-- Sidebar tabs -->
                            <ul id="s-tabs" class="content-tabs clearfix">
                                <li class="active"><a href="#s-tabs-1">Tab 1</a></li>
                                <li><a href="#s-tabs-2">Tab 2</a></li>
                                <li><a href="#s-tabs-3">Tab 3</a></li>
                            </ul>
                            <!-- END Sidebar tabs -->

                            <div class="body-con">
                                
                                <!-- Tabs content -->
                                <div id="s-tabs-1">Tab 1 content</div>
                                <div id="s-tabs-2">Tab 2 content</div>
                                <div id="s-tabs-3">Tab 3 content</div>
                                <!-- END Tabs content -->

                            </div>
                            <!-- END Tabs Box -->

                            <!-- Forms Box -->
                            <h3>Sidebar Forms</h3>
                            
                            <div class="body-con">
                                
                                <form action="javascript: void(0)" method="post" enctype="multipart/form-data" id="sf-form" name="sf-form">
                                    <label for="sf-username">Username</label>
                                    <input type="text" id="sf-username" name="sf-username" value="Admin" class="input-ok" />
                                    <label for="sf-email">Email (inactive)</label>
                                    <input type="text" id="sf-email" name="sf-email" value="admin@turboadmin.template" class="inactive" readonly />
                                    <label for="sf-password">Password</label>
                                    <input type="password" id="sf-password" name="sf-password" class="input-error" />
                                    <label for="sf-firstname">Firstname</label>
                                    <input type="text" id="sf-firstname" name="sf-firstname" value="John" />
                                    <label for="sf-lastname">Lastname</label>
                                    <input type="text" id="sf-lastname" name="sf-lastname" />
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
                            <!-- END Forms Box -->

                            <!-- Help Box -->
                            <h3>Help</h3>
                            <div class="body-con">
                                <p>Here you could have a help text with some useful information about the functionality of the page the user is viewing.</p>
                                <p>Or any text you would like to have and could come in handy :D</p>
                            </div>
                            <!-- END Help Box -->

                        </div>
                        <!-- END Sidebar -->

                        <!-- Main Content -->
                        <div id="main-content-left">
                            
                            <!-- Messages -->
                            <h2>Messages</h2>

                            <div class="body-con">
                                <div class="msg-alert"><h4>Alert message</h4>Something needs your , <a href="javascript: void(0)">link</a></div>
                                <div class="msg-error"><h4>Error message</h4>Something is wrong, <a href="javascript: void(0)">link</a></div>
                                <div class="msg-info"><h4>Info message</h4>Just to let you know, <a href="javascript: void(0)">link</a></div>
                                <div class="msg-ok"><h4>Success message</h4>Everything is good, <a href="javascript: void(0)">link</a></div>
                                <div class="msg-loading"><h4>Loading message</h4>Working..</div>
                            </div>
                            <!-- END Messages -->
                                                        
                            <!-- Main Tabs -->
                            <ul id="main-tabs" class="content-tabs clearfix">
                                <li class="active"><a href="#main-tabs-1">Tab 1</a></li>
                                <li><a href="#main-tabs-2">Tab 2</a></li>
                                <li><a href="#main-tabs-3">Tab 3</a></li>
                            </ul>

                            <div class="body-con">
                                
                                <!-- Tabs content -->
                                <div id="main-tabs-1">Tab 1 content</div>
                                <div id="main-tabs-2">Tab 2 content</div>
                                <div id="main-tabs-3">Tab 3 content</div>
                                <!-- END Tabs content -->

                            </div>
                            <!-- END Main Tabs -->

                            <!-- Table example -->
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="5">Server Status (check the tootips at the red icons)</th>
                                    </tr>
                                    <tr>
                                        <th>Servers</th>
                                        <th>Apache</th>
                                        <th>FTP</th>
                                        <th>MySQL</th>
                                        <th>IMAP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="tbold backcolor">Server #1</td>
                                        <td><img src="img/icon_ok.png" alt="ok" /></td>
                                        <td><img src="img/icon_ok.png" alt="ok" /></td>
                                        <td><img src="img/icon_ok.png" alt="ok" /></td>
                                        <td><img src="img/icon_ok.png" alt="ok" /></td>
                                    </tr>
                                    <tr>
                                        <td class="tbold backcolor">Server #2</td>
                                        <td><img src="img/icon_ok.png" alt="ok" /></td>
                                        <td><img src="img/icon_ok.png" alt="ok" /></td>
                                        <td><img src="img/icon_ok.png" alt="ok" /></td>
                                        <td><img src="img/icon_ok.png" alt="ok" /></td>
                                    </tr>
                                    <tr>
                                        <td class="tbold backcolor">Server #3</td>
                                        <td><img src="img/icon_bad.png" alt="bad" class="tiptip-top" title="Apache is not running!" /></td>
                                        <td><img src="img/icon_ok.png" alt="ok" /></td>
                                        <td><img src="img/icon_ok.png" alt="ok" /></td>
                                        <td><img src="img/icon_ok.png" alt="ok" /></td>
                                    </tr>
                                    <tr>
                                        <td class="tbold backcolor">Server #4</td>
                                        <td><img src="img/icon_ok.png" alt="ok" /></td>
                                        <td><img src="img/icon_ok.png" alt="ok" /></td>
                                        <td><img src="img/icon_bad.png" alt="bad" class="tiptip-top" title="MySQL is not running!" /></td>
                                        <td><img src="img/icon_ok.png" alt="ok" /></td>
                                    </tr>
                                    <tr>
                                        <td class="tbold backcolor">Server #5</td>
                                        <td><img src="img/icon_ok.png" alt="ok" /></td>
                                        <td><img src="img/icon_unknown.png" alt="unknown" class="tiptip-top" title="FTP status is unknown!" /></td>
                                        <td><img src="img/icon_ok.png" alt="ok" /></td>
                                        <td><img src="img/icon_ok.png" alt="ok" /></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- END Table example -->

                            <!-- Pagination example -->
                            <ul class="pagination tcenter">
                                <li><a href="javascript: void(0)" class="page radius">Previous</a></li>
                                <li><a href="javascript: void(0)" class="page radius">1</a></li>
                                <li><span class="page-active radius">2</span></li>
                                <li><a href="javascript: void(0)" class="page radius">3</a></li>
                                <li><a href="javascript: void(0)" class="page radius">Next</a></li>
                                <li><span class="page-inactive radius">Page 2 of 3</span></li>
                            </ul>
                            <!-- END Pagination example -->

                            <!-- Forms examples -->
                            <h1>Forms</h1>

                            <form action="javascript: void(0)" method="post" enctype="multipart/form-data" id="test-form" name="test-form">
                                
                                <fieldset>
                                    <legend>Test form</legend>
                                    <ul class="align-list">
                                        <li>
                                            <label for="test-username">Username <span>*</span></label>
                                            <input type="text" id="test-username" name="test-username" />
                                            <span class="msg-form-info">Alphanumeric characters only!</span>
                                        </li>
                                        <li>
                                            <label for="test-email">Email <span>*</span></label>
                                            <input type="text" id="test-email" name="test-email" />
                                        </li>
                                        <li>
                                            <label for="test-password">Password <span>*</span></label>
                                            <input type="password" id="test-password" name="test-password" />
                                            <span class="msg-form-info">At least 6 characters!</span>
                                        </li>
                                        <li>
                                            <label for="test-password2">Repear password <span>*</span></label>
                                            <input type="password" id="test-password2" name="test-password2" />
                                            <span class="msg-form-info">At least 6 characters!</span>
                                        </li>
                                        <li>
                                            <label for="test-firstname">Firstname</label>
                                            <input type="text" id="test-firstname" name="test-firstname" />
                                        </li>
                                        <li>
                                            <label for="test-lastname">Lastname</label>
                                            <input type="text" id="test-lastname" name="test-lastname" />
                                        </li>
                                        <li>
                                            <label for="test-birthdate">Birth date</label>
                                            <input type="text" id="test-birthdate" name="test-birthdate" class="box-small datepicker" />
                                        </li>
                                        <li>
                                            <label for="test-role">Role <span>*</span></label>
                                            <select id="test-role" name="test-role">
                                                <option value="0" selected>Member</option>
                                                <option value="1">Comment Moderator</option>
                                                <option value="2">Site Moderator</option>
                                                <option value="3">Site Administrator</option>
                                            </select>
                                        </li>
                                    </ul>
                                </fieldset>
                                
                                <fieldset>
                                    <legend>Small (+ tooltip)</legend>
                                    <label for="test-username-small">Username:</label>
                                    <input type="text" id="test-username-small" name="test-username-small" class="box-small input-ok tiptip-top" title="You can have a tooltip too" />
                                    <span class="msg-form-ok">That's correct!</span>
                                </fieldset>
                                
                                <fieldset>
                                    <legend>Medium (+ tooltip)</legend>
                                    <label for="test-email-medium">Email:</label>
                                    <input type="text" id="test-email-medium" name="test-email-medium" class="input-error tiptip-bottom" title="Another tooltip!" />
                                    <span class="msg-form-error">That's not correct!</span>
                                </fieldset>
                                
                                <fieldset>
                                    <legend>Large (+ tooltip)</legend>
                                    <label for="test-other-large">Other information:</label>
                                    <input type="text" id="test-other-large" name="test-other-large" class="box-large tiptip-right" title="There is also an extra large input style!" />
                                </fieldset>
                                
                                <fieldset>
                                    <legend>Textareas</legend>
                                    <ul class="align-list">
                                        <li>
                                            <label for="test-textarea">Enter your message:</label>
                                            <textarea id="test-textarea" name="test-textarea" cols="100" rows="12" class="box-large"></textarea>
                                        </li>
                                        <li>
                                            <label for="test-textarea-editor">WYSIWYG editor:</label>
                                            <textarea id="test-textarea-editor" name="test-textarea-editor" cols="100" rows="12" class="box-large wysiwyg"></textarea>
                                        </li>
                                    </ul>
                                </fieldset>
                                
                                <fieldset class="labels-auto">
                                    <legend>Select</legend>
                                    <label for="test-option">Choose one:</label>
                                    <select id="test-option" name="test-option" class="box-small">
                                        <option value="0" selected="selected">Default</option>
                                        <option value="1">1st Option</option>
                                        <option value="2">2nd Option</option>
                                        <option value="3">3rd Option</option>
                                    </select>
                                </fieldset>
                                
                                <fieldset class="labels-auto">
                                    <legend>Radio buttons</legend>
                                    <label for="test-radio1">Radio 1</label>
                                    <input type="radio" id="test-radio1" name="test-radio" value="1" />
                                    <label for="test-radio2">Radio 2</label>
                                    <input type="radio" id="test-radio2" name="test-radio" value="2" />
                                    <label for="test-radio3">Radio 3</label>
                                    <input type="radio" id="test-radio3" name="test-radio" value="3" />
                                </fieldset>
                                
                                <fieldset class="labels-auto">
                                    <legend>Checkboxes</legend>
                                    <label for="test-checkbox1">Checkbox 1</label>
                                    <input type="checkbox" id="test-checkbox1" name="test-checkbox1" value="1" />
                                    <label for="test-checkbox2">Checkbox 2</label>
                                    <input type="checkbox" id="test-checkbox2" name="test-checkbox2" value="2" />
                                    <label for="test-checkbox3">Checkbox 3</label>
                                    <input type="checkbox" id="test-checkbox3" name="test-checkbox3" value="3" />
                                </fieldset>
                                
                                <fieldset class="labels-auto">
                                    <legend>File upload</legend>
                                    <label for="test-file">Upload file</label>
                                    <input type="file" id="test-file" name="test-file"/>
                                </fieldset>
                                
                                <fieldset>
                                    <legend>Buttons</legend>
                                    <input type="submit" value="Submit" />
                                    <input type="submit" value="Upload" class="green" />
                                    <input type="submit" value="Delete" class="red" />
                                    <input type="submit" value="Post" class="grey" />
                                </fieldset>
                                
                            </form>
                            <!-- END Forms examples -->

                            <!-- Typography Example -->
                            <h1>Typography</h1>

                            <div class="body-con">
                                
                                <!-- Heading styles -->
                                <h1>Heading 1</h1>
                                <h2>Heading 2</h2>
                                <h3>Heading 3</h3>
                                <h4>Heading 4</h4>
                                <h5>Heading 5</h5>
                                <h6>Heading 6</h6>

                                <!-- List styles -->
                                <h4>Unordered list</h4>
                                <ul>
                                    <li>First</li>
                                    <li>Second</li>
                                    <li>Third</li>
                                </ul>

                                <h4>Ordered list</h4>
                                <ol>
                                    <li>First</li>
                                    <li>Second</li>
                                    <li>Third</li>
                                </ol>

                                <h4>Definition list</h4>
                                <dl>
                                    <dt>Coffee</dt>
                                      <dd>Is great</dd>
                                    <dt>Sugar</dt>
                                      <dd>Is great in coffee</dd>
                                </dl>

                                <!-- Links style -->
                                <h4>Links</h4>
                                <p>
                                    <a href="javascript: void(0)">This is the default blue link</a><br />
                                    <a href="javascript: void(0)" class="agreen">This is a green link</a><br />
                                    <a href="javascript: void(0)" class="ared">This is a red link</a>
                                </p>

                                <!-- Text styles -->
                                <h4>Text</h4>
                                <p><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</em></p>
                                <p><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</strong></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <!-- END Typography Example -->

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