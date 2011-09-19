<form action="Javascript:void(0);" onSubmit="go_post('myaccount/update',this,'')" method="post">
<h3 class="icon_info upperfirst">Update Account Information -  Account Status : {user_status} </h3>
<div class="body-con">
	<input type="hidden" name="user_key" value="{user_key}" >
	<label> First Name:</label>
    <input type="text" name="user_fname" id="user_fname" class="tiptip-top" title="Hello, What's your name?" value="{user_fname}"><br>
    <label> Last Name:</label>
    <input type="text" name="user_lname" id="user_lname"  value="{user_lname}"><br>
    <label> Your E-Mail: </label>
    <input type="text" name="email"  value="{email}" class="tiptip-top input-ok" title="If you change your email, you will need to activate your account again." id="email" ><br>
    <label> I Am:</label>
   	<input type="radio" name="user_sex" value="male"  > Male 
   	<input type="radio" name="user_sex" value="female"> Female   <br>
	<label> Birthday: </label>
    <input type="text" class="datepicker" name="user_birthday" id="user_birthday"   value="{user_birthday}" readonly ><br>
	
    <label> Where do you live? </label>
    <select name="user_country" id="user_country">
    	{countries}
    </select><br>
    <label> Address: </label>
    <input type="text" name="user_address" id="user_address"  value="{user_address}" ><br>    
    <label> City: </label>
    <input type="text" name="user_city" id="user_city"  value="{user_city}" ><br>
    <label> State: </label>
    <input type="text" name="user_state" id="user_state"  value="{user_state}" ><br>  
    <label> Zip Code: </label>
    <input type="text" name="user_zipcode" id="user_zipcode"  value="{user_zipcode}" ><br>       

    <label> Receive E-Mail? </label>
   	<input type="radio" name="user_mail" value="1"  > Yes
   	<input type="radio" name="user_mail" value="0"> No   <br>	
    <label> Phone: </label>
    <input type="text" name="user_phone" id="user_phone"  value="{user_phone}" ><br>        
	<p align=center >
		<input type="submit" value="Update Account">
    </p>
</div>
<h3 class="icon_info">Change Password</h3>
<div class="body-con">
    <label> Current Password:</label>
    <input type="password" name="password" id="password" value="" class="tiptip-top input-ok" title="Enter current password."><br>
    <label> New Password:</label>
    <input type="password" name="newpassword" id="newpassword" class="tiptip-top" title="Password use for login! Please remember it!"><br>
    <label> Confirm Password:</label>
    <input type="password" name="renewpassword" id="renewpassword" class="tiptip-top" title="Confirm Your Password Again"><br>    
    <p align=center >
		<input type="submit" value="Change Password" class="red" >    
    </p>
</div>
</form>
<script  language="javascript">
$('#user_birthday').datepicker({
		changeMonth: true,
		changeYear: true,
		defaultDate: -(365*18)		
	});
$("input[type=radio][value='{user_sex}']").click();
$("input[type=radio][name=user_mail][value='{user_mail}']").click();
$("#user_country").val('{user_country}');

</script>