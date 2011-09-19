<!DOCTYPE html>
<html>

    <head>

        <title>Music Admin - Login</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?=themes("admin/img/favicon.ico");?>" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>      
        <!-- TurboAdmin main style -->
		<?php
			required_css(array(
				"turbo.admin.style" => "",
				"jquery.uniform" => "",
				"osx" => "osx"
			));
			required_js(array(				
				"jquery.uniform" => "",
				"osx" => "osx",
				"simple.modal" => "simple.modal"
			));
			
		?>
		
		<script src="<?=_URL_?>/js./tmp/admin/global.js" language="javascript" ></script>
		<script>
            $(document).ready(function(){
               
                /* Initialize Uniform, form styling */
                $("select").uniform();
                $("input:checkbox").uniform();
                $("input:radio").uniform();
                $("input:file").uniform();
				
                // Hide the login form and show the reminder form
                $('#a-reminder').click(function(){
                    $('#wl-form').slideUp( 300, function(){
                        $('#wr-form').slideDown( 300, function(){
                            $('#a-reminder').hide( 1, function(){
                                $('#a-login').show();
                                $('#wr-email').focus();
                            });
                        });
                    });
                });

                // Hide the reminder form and show the login form
                $('#a-login').click(function(){
                    $('#wr-form').slideUp( 300, function(){
                        $('#wl-form').slideDown( 300, function(){
                            $('#a-login').hide( 1, function(){
                                $('#a-reminder').show();
                            });
                        });
                    });
                });

            });
        </script>
		
                
    </head>

    <body>
        
        <!-- Login Outer -->
        <div id="login-container-outer" class="radius">

            <!-- Login Container -->
            <div id="login-container" class="radius">

                <!-- Login Header -->
                <div id="login-header" class="radius-top">

                    <!-- Login Logo -->
                    <a href="login.php">
                        <img src="<?=themes("admin/img/login_logo.png")?>" alt="login logo" />
                    </a>
                    
                </div>
                <!-- END Login Header -->

                <!-- Login Content -->
                <div id="login-content">

                    <form action="Javascript: void(0);" method="post" id="wl-form" name="wl-form" onSubmit="check_admin_login('wl-username','wl-password');return false;">
                        <label for="wl-username">Username</label>
                        <input type="text" id="wl-username" name="wl-username" value="admin" />
                        <label for="wl-password">Password</label>
                        <input type="password" id="wl-password" name="wl-password" value="demo" />
                        <label for="wl-remember">Remember me</label>
                        <input type="checkbox" id="wl-remember" name="wl-remember" />
                        <input type="submit" value="Enter" id="wl-btn" name="wl-btn" class="fright" />
                    </form>

                    <form action="javascript: void(0)" method="post" id="wr-form" name="wr-form" class="dis-none">
                        <label for="wr-email">Enter your email</label>
                        <input type="text" id="wr-email" name="wr-email" />
                        <p class="tright">
                            <input type="submit" value="Send the password" id="wr-btn" name="wr-btn" />
                        </p>
                    </form>

                </div>
                <!-- END Login Content -->

                <!-- Login Extra -->
                <div id="login-extra" class="radius-bottom">
                    <a id="a-reminder" href="javascript: void(0)" class="afooter-link">Forgot password?</a>
                    <a id="a-login" href="javascript: void(0)" class="afooter-link dis-none">Suddenly remembered?</a>
                </div>
                <!-- END Login Extra -->

            </div>
            <!-- END Login Container -->

        </div>
        <!-- END Login Outer -->
        
       <div id="osx-modal-content">
                    <div id="osx-modal-title">System Messages</div>
                    <div class="close"><a href="#" class="simplemodal-close">x</a></div>
                    <div id="osx-modal-data">
                        <div id="datax" name="datax"></div>
                        <p><button class="simplemodal-close" id="closex" >Close</button> <span></span></p><br />
                    <div id="urlre"></div>
                    </div>           
        </div> 
		<div class="msg-loading" id="modalx"><h4>Loading message</h4>Working..</div>  

        
    </body>

</html>