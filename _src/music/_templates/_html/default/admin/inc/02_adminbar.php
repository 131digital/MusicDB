<!-- Admin Outer -->
<div id="adminbar-outer" class="radius-bottom">

    <!-- Adminbar -->
    <div id="adminbar" class="radius-bottom">

        <!-- Logo -->
        <a href="index.php" id="logo"></a>

        <!-- Details -->
        <div id="details">
            <a href="javascript: void(0)" class="avatar">
                <img src="<?=themes("admin/");?>img/avatar.jpg" alt="avatar" width="36" height="36" />
            </a>
            <div class="tcenter">
                Hi <strong>Admin</strong>!<br/><a href="javascript: void(0)" class="alight">Visit website</a> | <a href="login.php" class="alightred">Logout</a>
            </div>
        </div>
        <!-- END Details -->

        <!-- Widgets -->
        <div id="widgets">

            <!-- Widget menu -->
            <ul id="widget-menu">
                <li>

                    <!-- Link for website settings widget -->
                    <a href="javascript: void(0)" class="w-link"><img src="<?=themes("admin/");?>img/w-icon-website-settings.png" alt="Website settings" /></a>

                    <!-- Popup for website settings widget, just a div with the 'widget' class -->
                    <div class="widget">
                        <div class="w-top"></div>
                        <div class="w-content">
                            
                            <!-- Settings sub navigation -->
                            <ul id="w-tabs-settings" class="widget-sub-nav">
                                <li class="active"><a href="#w-tabs-settings-profile" class="nav3">Profile</a></li>
                                <li><a href="#w-tabs-settings-site" class="nav3">Site</a></li>
                                <li><a href="#w-tabs-settings-servers" class="nav3">Servers</a></li>
                            </ul>
                            <!-- END Settings sub navigation -->

                            <!-- Settings tabs content -->
                            
                            <!-- Profile tab -->
                            <div id="w-tabs-settings-profile">
                                
                                <form action="javascript: void(0)" method="post" enctype="multipart/form-data" id="ap-form" name="ap-form">
                                    <div class="msg-info tcenter">From here you can change your personal data!</div>
                                    <label for="ap-username">Username</label>
                                    <input type="text" id="ap-username" name="ap-username" value="Admin" class="input-ok" />
                                    <label for="ap-email">Email</label>
                                    <input type="text" id="ap-email" name="ap-email" value="admin@turboadmin.template" class="input-error" />
                                    <label for="ap-password">Password</label>
                                    <input type="password" id="ap-password" name="ap-password" />
                                    <label for="ap-firstname">Firstname</label>
                                    <input type="text" id="ap-firstname" name="ap-firstname" value="John" />
                                    <label for="ap-lastname">Lastname</label>
                                    <input type="text" id="ap-lastname" name="ap-lastname" />
                                    <label for="ap-role">Role</label>
                                    <select id="ap-role" name="ap-role">
                                        <option value="0">Member</option>
                                        <option value="1">Comment Moderator</option>
                                        <option value="2">Site Moderator</option>
                                        <option value="3" selected>Site Administrator</option>
                                    </select>
                                    <label for="ap-avatar">New avatar</label>
                                    <input type="file" id="ap-avatar" name="ap-avatar" />
                                    <p class="tcenter">
                                        <input type="submit" value="Update" id="ap-btn" name="ap-btn" />
                                        <input type="submit" value="Cancel" class="red" onclick="close_widgets();" />
                                    </p>
                                </form>
                                
                            </div>
                            <!-- END Profile tab -->

                            <!-- Settings tab -->
                            <div id="w-tabs-settings-site">
                                
                                <div class="msg-ok tcenter">Website's settings updated!</div>
                                <div class="msg-error tcenter">Oups, there was an error!</div>
                                
                                <form action="javascript: void(0)" method="post" id="ws-form" name="ws-form">
                                    <label for="ws-name">Website's title</label>
                                    <input type="text" id="ws-name" name="ws-name" value="Your website's title!" />
                                    <label for="ws-desc">Description (meta data)</label>
                                    <textarea id="ws-desc" name="ws-desc" cols="43" rows="5">The site's description goes here!</textarea>
                                    <label for="ws-keywords">Keywords (meta data)</label>
                                    <input type="text" id="ws-keywords" name="ws-keywords" value="cool, great, unique, wonderful" />
                                    <label for="ws-offline" class="label-auto">Offline mode</label>
                                    <input type="checkbox" id="ws-offline" name="ws-offline" checked />
                                    <p class="tcenter">
                                        <input type="submit" value="Update" id="ws-btn" name="ws-btn" />
                                    </p>
                                </form>
                                
                            </div>
                            <!-- END Settings tab -->

                            <!-- Servers tab -->
                            <div id="w-tabs-settings-servers">
                                
                                <div class="msg-alert tcenter">Attention! Some services are not running!</div>
                                
                                <table class="mar-none">
                                    <thead>
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
                                            <td><img src="<?=themes("admin/");?>img/icon_ok.png" alt="ok" /></td>
                                            <td><img src="<?=themes("admin/");?>img/icon_ok.png" alt="ok" /></td>
                                            <td><img src="<?=themes("admin/");?>img/icon_ok.png" alt="ok" /></td>
                                            <td><img src="<?=themes("admin/");?>img/icon_ok.png" alt="ok" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tbold backcolor">Server #2</td>
                                            <td><img src="<?=themes("admin/");?>img/icon_ok.png" alt="ok" /></td>
                                            <td><img src="<?=themes("admin/");?>img/icon_ok.png" alt="ok" /></td>
                                            <td><img src="<?=themes("admin/");?>img/icon_ok.png" alt="ok" /></td>
                                            <td><img src="<?=themes("admin/");?>img/icon_ok.png" alt="ok" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tbold backcolor">Server #3</td>
                                            <td><img src="<?=themes("admin/");?>img/icon_bad.png" alt="bad" class="tiptip-top" title="Apache is not running!" /></td>
                                            <td><img src="<?=themes("admin/");?>img/icon_ok.png" alt="ok" /></td>
                                            <td><img src="<?=themes("admin/");?>img/icon_ok.png" alt="ok" /></td>
                                            <td><img src="<?=themes("admin/");?>img/icon_ok.png" alt="ok" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tbold backcolor">Server #4</td>
                                            <td><img src="<?=themes("admin/");?>img/icon_ok.png" alt="ok" /></td>
                                            <td><img src="<?=themes("admin/");?>img/icon_ok.png" alt="ok" /></td>
                                            <td><img src="<?=themes("admin/");?>img/icon_bad.png" alt="bad" class="tiptip-top" title="MySQL is not running!" /></td>
                                            <td><img src="<?=themes("admin/");?>img/icon_ok.png" alt="ok" /></td>
                                        </tr>
                                        <tr>
                                            <td class="tbold backcolor">Server #5</td>
                                            <td><img src="<?=themes("admin/");?>img/icon_ok.png" alt="ok" /></td>
                                            <td><img src="<?=themes("admin/");?>img/icon_unknown.png" alt="unknown" class="tiptip-top" title="FTP status is unknown!" /></td>
                                            <td><img src="<?=themes("admin/");?>img/icon_ok.png" alt="ok" /></td>
                                            <td><img src="<?=themes("admin/");?>img/icon_ok.png" alt="ok" /></td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                            <!-- END Servers tab -->
                            
                            <!-- END Settings tabs content -->

                        </div>
                        <div class="w-bottom"></div>
                    </div>
                    <!-- END Popup for website settings widget -->

                </li>
                <li>

                    <!-- Link for pm widget -->
                    <a href="javascript: void(0)" class="w-link"><img src="<?=themes("admin/");?>img/w-icon-pm.png" alt="Pm" /><span>2</span></a>

                    <!-- Popup for pm widget -->
                    <div class="widget">
                        <div class="w-top"></div>
                        <div class="w-content">

                            <!-- PM sub navigation -->
                            <ul id="w-tabs-pm" class="widget-sub-nav">
                                <li class="active"><a href="#w-tabs-pm-inbox" class="nav4">Lyrics Update</a></li>
                                <li><a href="#w-tabs-pm-sent" class="nav4">Brokens</a></li>
                                <li><a href="<?=_URL_?>/admin/queue" class="nav4">Others</a></li>                               
                            </ul>
                            <!-- END PM sub navigation -->

                            <!-- PM tabs content -->
                            
                            <!-- Inbox tab -->
                            <div id="w-tabs-pm-inbox">
                                <div class="pm-message pm-new clearfix">
                                    <img src="<?=themes("admin/");?>img/avatar4.jpg" alt="avatar" />
                                    <p class="pm-info"><strong>Mike</strong>, 20/03/2011 15:21</p>
                                    <p class="pm-msg">Hi Admin, I just wanted to tell you how awesome your website is, I really like the articles and the design!</p>
                                </div>
                                <div class="pm-message pm-new clearfix">
                                    <img src="<?=themes("admin/");?>img/avatar5.jpg" alt="avatar" />
                                    <p class="pm-info"><strong>John</strong>, 15/03/2011 18:51</p>
                                    <p class="pm-msg">Hi! Just wanted to ask you if you need any moderators. I'd like to help!</p>
                                </div>
                                <div class="pm-message clearfix">
                                    <img src="<?=themes("admin/");?>img/avatar6.jpg" alt="avatar" />
                                    <p class="pm-info"><strong>Lisa</strong>, 25/02/2011 12:01</p>
                                    <p class="pm-msg">Hi there Admin! How are you? When would you like the new article to be ready?</p>
                                </div>
                                <div class="pm-message clearfix">
                                    <img src="<?=themes("admin/");?>img/avatar7.jpg" alt="avatar" />
                                    <p class="pm-info"><strong>Emma</strong>, 20/02/2011 08:11</p>
                                    <p class="pm-msg">Hi! I can't write a comment, could you help me please? Thanks in advance!</p>
                                </div>
                                <p class="tcenter">
                                    <button class="green" onclick="javascript: void(0);">Mark all as read</button>
                                    <button class="red" onclick="javascript: void(0);">Delete all PMs</button>
                                </p>
                            </div>
                            <!-- END Inbox tab -->

                            <!-- Sent tab -->
                            <div id="w-tabs-pm-sent">
                                <div class="msg-info mar-none">There are no sent messages!</div>
                            </div>
                            <!-- END Sent tab -->

                            <!-- Trash tab -->
                            <div id="w-tabs-pm-trash">
                                <div class="pm-message pm-deleted clearfix">
                                    <img src="<?=themes("admin/");?>img/avatar3.jpg" alt="avatar" />
                                    <p class="pm-info"><strong>turboadminer</strong>, 10/01/2011 21:59</p>
                                    <p class="pm-msg">Man, we got to update the comments section soon!</p>
                                </div>
                                <div class="pm-message pm-deleted clearfix">
                                    <img src="<?=themes("admin/");?>img/avatar2.jpg" alt="avatar" />
                                    <p class="pm-info"><strong>turboModer</strong>, 09/01/2011 10:25</p>
                                    <p class="pm-msg">ok, I think we are going to need new moderators with 1000 registrations per day!</p>
                                </div>
                                <p class="tcenter">
                                    <button class="red" onclick="javascript: void(0);">Empty trash</button>
                                </p>
                            </div>
                            <!-- END Trash tab -->

                            <!-- New pm tab -->
                            <div id="w-tabs-pm-new-pm">
                                <div class="msg-loading">Sending..</div>
                                <div class="msg-ok tcenter">Message sent!</div>
                                <form action="javascript: void(0)" method="post" name="pm-form" id="pm-form">
                                    <label for="pm-to-user">To</label>
                                    <input type="text" name="pm-to-user" id="pm-to-user" />
                                    <label for="pm-message">Message</label>
                                    <textarea name="pm-message" id="pm-message" cols="43" rows="1" class="elastic"></textarea>
                                    <p class="tright">
                                        <input type="submit" value="Send" name="pm-btn" id="pm-btn" class="green" />
                                    </p>
                                </form>
                            </div>
                            <!-- END New pm tab -->
                            
                            <!-- END PM tabs content -->

                        </div>
                        <div class="w-bottom"></div>
                    </div>
                    <!-- END Popup for pm widget -->

                </li>
                <li>

                    <!-- Link for add user widget -->
                    <a href="javascript: void(0)" class="w-link"><img src="<?=themes("admin/");?>img/w-icon-adduser.png" alt="Add user" /></a>

                    <!-- Popup for add user widget -->
                    <div class="widget">
                        <div class="w-top"></div>
                        <div class="w-content">
                            
                            <h2>Add user</h2>
                            
                            <form action="javascript: void(0)" method="post" enctype="multipart/form-data" id="au-form" name="au-form">
                                <label for="au-username">Username</label>
                                <input type="text" id="au-username" name="au-username" />
                                <label for="au-email">Email</label>
                                <input type="text" id="au-email" name="au-email" />
                                <label for="au-password">Password</label>
                                <input type="password" id="au-password" name="au-password" />
                                <label for="au-firstname">Firstname</label>
                                <input type="text" id="au-firstname" name="au-firstname" />
                                <label for="au-lastname">Lastname</label>
                                <input type="text" id="au-lastname" name="au-lastname" />
                                <label for="au-role">Role</label>
                                <select id="au-role" name="au-role">
                                    <option value="0" selected>Member</option>
                                    <option value="1">Comment Moderator</option>
                                    <option value="2">Site Moderator</option>
                                    <option value="3">Site Administrator</option>
                                </select>
                                <label for="au-avatar">Avatar</label>
                                <input type="file" id="au-avatar" name="au-avatar" />
                                <p class="tcenter">
                                    <input type="submit" value="Add user" id="au-btn" name="au-btn" class="green" />
                                    <input type="submit" value="Cancel" class="red" onclick="close_widgets();" />
                                </p>
                            </form>
                            
                        </div>
                        <div class="w-bottom"></div>
                    </div>
                    <!-- END Popup for add user widget -->

                </li>
                <li>

                    <!-- Link for Twitter widget -->
                    <a href="javascript: void(0)" class="w-link"><img src="<?=themes("admin/");?>img/w-icon-twitter.png" alt="Twitter" /></a>

                    <!-- Popup for Twitter widget -->
                    <div class="widget">
                        <div class="w-top"></div>
                        <div class="w-content">

                            <!-- Twitter sub navigation -->
                            <ul id="w-tabs-twitter" class="widget-sub-nav">
                                <li class="active"><a href="#w-tabs-twitter-update-status" class="nav2">What's Up?</a></li>
                                <li><a id="load-twitter-updates" href="#w-tabs-twitter-recent-updates" class="nav2">Recent Updates</a></li>
                            </ul>
                            <!-- END Twitter sub navigation -->

                            <!-- Twitter tabs content -->
                            
                            <!-- Update status tab -->
                            <div id="w-tabs-twitter-update-status">

                                <div id="twitter-status-update">
                                    <div class="msg-info">Type and watch the textarea auto expand :)</div>
                                </div>

                                <form action="javascript: void(0)" method="post" name="t-form" id="t-form" class="clearfix">
                                    <textarea name="t-twitter-status" id="t-twitter-status" class="elastic" cols="43" rows="1"></textarea>
                                    <p id="t-twitter-limit" class="fleft mar-none"></p>
                                    <input type="submit" value="Update status" name="t-btn" id="t-btn" class="fright" />
                                </form>

                            </div>
                            <!-- END Update status tab -->

                            <!-- Recent Updates -->
                            <div id="w-tabs-twitter-recent-updates">
                                
                                <div id="twitter-updates">
                                    <div class="t-tweet clearfix">
                                        <img src="<?=themes("admin/");?>img/avatar1.jpg" alt="avatar" />
                                        <p class="t-info"><strong>JohnGR</strong>, April 15 12:00</p>
                                        <p class="t-status">This is a test tweet, just for demonstration!</p>
                                    </div>
                                    <div class="t-tweet clearfix">
                                        <img src="<?=themes("admin/");?>img/avatar1.jpg" alt="avatar" />
                                        <p class="t-info"><strong>JohnGR</strong>, April 15 12:00</p>
                                        <p class="t-status">This is a test tweet, just for demonstration!</p>
                                    </div>
                                    <div class="t-tweet clearfix">
                                        <img src="<?=themes("admin/");?>img/avatar1.jpg" alt="avatar" />
                                        <p class="t-info"><strong>JohnGR</strong>, April 15 12:00</p>
                                        <p class="t-status">This is a test tweet, just for demonstration!</p>
                                    </div>
                                    <div class="t-tweet clearfix">
                                        <img src="<?=themes("admin/");?>img/avatar1.jpg" alt="avatar" />
                                        <p class="t-info"><strong>JohnGR</strong>, April 15 12:00</p>
                                        <p class="t-status">This is a test tweet, just for demonstration!</p>
                                    </div>
                                    <div class="t-tweet clearfix">
                                        <img src="<?=themes("admin/");?>img/avatar1.jpg" alt="avatar" />
                                        <p class="t-info"><strong>JohnGR</strong>, April 15 12:00</p>
                                        <p class="t-status">This is a test tweet, just for demonstration!</p>
                                    </div>
                                </div>
                                <!-- END Recent Updates -->

                            </div>
                            <!-- END Twitter tabs content -->

                        </div>
                        <div class="w-bottom"></div>
                    </div>
                    <!-- END Popup for Twitter widget -->

                </li>
                <li>

                    <!-- Link for custom widget -->
                    <a href="javascript: void(0)" class="w-link"><img src="<?=themes("admin/");?>img/w-icon-custom.png" alt="Custom" /></a>

                    <!-- Popup for custom widget -->
                    <div class="widget">
                        <div class="w-top"></div>
                        <div class="w-content">
                            <h2>Create your widgets!</h2>
                            <p>Create the widgets with the functionality you need! Set up as many as you want but watch out for the logo :P !</p>
                            <h2>Fluid, fixed layout? Fixed Adminbar?</h2>
                            <p>Add a class and change TurboAdmin layout. You want a fluid or a fixed layout? Maybe a fixed Adminbar? You can get it :) Head on to 'Your page' and see!</p>
                            <p>Make TurboAdmin way bigger and go crazy with the widgets!</p>
                        </div>
                        <div class="w-bottom"></div>
                    </div>
                    <!-- END Popup for custom widget -->

                </li>
            </ul>
            <!-- END Widget menu -->

        </div>
        <!-- END Widgets -->

    </div>
    <!-- END Adminbar -->

</div>
<!-- END Admin Outer -->