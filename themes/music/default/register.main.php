<form action="Javascript: void(0);" onsubmit="go_post('register/register',this,'login');">
<h3 class="icon_sound upperfirst">Register New Account ♫ ♫ It's free and always will be </h3>
<div class="body-con">
<div class="msg-info"><h4>Only 1 min to complete this form</h4><br>
.. and you can create your own playlists, votes, and more ...
</div>
    <label> First Name:</label>
    <input type="text" name="user_fname" id="user_fname" class="tiptip-top" title="Hello, What's your name?" ><br>
    <label> Last Name:</label>
    <input type="text" name="user_lname" id="user_lname" ><br>
    <label> Your E-Mail: </label>
    <input type="text" name="email" class="tiptip-top input-ok" title="E-Mail @ blabla.com" id="email" ><br>
    <label> Re-enter E-Mail:</label>
    <input type="text" name="reemail" id="reemail" class="tiptip-bottom" title="Just re-enter to confirm your email again"><br>
    <label> New Password:</label>
    <input type="password" name="password" id="password" class="tiptip-top input-ok" title="Password use for login! Please remember it!"><br>
    <label> I Am:</label>
   	<input type="radio" name="user_sex" value="male" checked > Male 
   	<input type="radio" name="user_sex" value="female"> Female   <br>
	<label> Birthday: </label>
    <input type="text" class="datepicker" name="user_birthday" id="user_birthday"  readonly="readonly" ><br>
    <label> Where do you live? </label>
    <select name="user_country" id="user_country">
    		<?php
			echo $helper->list_countries();
			?>    
    </select>

</div>
<h3> Terms Of Services </h3>
<div class="body-con">
<input type="checkbox" name="agree" id="agree" value="1"> I have read and agree with Terms Of Services, Privacy Policy.<br>
<input type="checkbox" name="user_mail" id="user_mail" value="1" checked > I want to receive email, special news from this website.<br>
<br>
<p align=center >
	<input type="submit" name="submit" value="Sign Up!">
</p>
<br>
</div>
</form>
<script  language="javascript">
$('#user_birthday').datepicker({
		changeMonth: true,
		changeYear: true,
		defaultDate: -(365*18)		
	});
</script>