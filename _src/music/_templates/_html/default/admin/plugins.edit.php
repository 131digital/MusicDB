<?php
	$name = $helper->fast("name",1);
	$ht = $db->fast_get("cronjob","cron_name='".$name."'");
	$helper->set_value("#cron_time",$ht['cron_time']);
	$helper->set_value("#cron_status",$ht['cron_status']);	
	$helper->set_value("#cron_interval",$ht['cron_interval']);	
	
?><h3>Update Plugins</h3>
<div class="body-con">
<form action="Javascript: void(0);" onSubmit="go_post('admin/plugins/edit',this,'admin/plugins/');">
    <label> Plugins Name: </label>
    <input type="text" name="cron_name" id="cron_name" value="<?=un_quotes($ht['cron_name'])?>" readonly="readonly" ><br>
	<label> Run Every Min: </label>
    <select name="cron_time" id="cron_time" >
	    <option value='1'>1</option>
	    <option value='3'>3</option>
	    <option value='5'>5</option>
    	<option value='10'>10</option>
    	<option value='15'>15</option>
    	<option value='20'>20</option>
    	<option value='25'>25</option>                        
    	<option value='30'>30</option>                        
    	<option value='45'>45</option>                                        
    	<option value='60'>60</option>                                                
    	<option value='90'>90</option>                                                        
    	<option value='120'>120</option>                                                                
    </select>
    <br>
	<label>Cron Interval:</label>
    <select name="cron_interval" id="cron_interval">
    	<option value='MINUTE'>MINUTE</option>
    	<option value='DAY'>DAY</option>                  
    </select>
    <br>
        
	<label>Cron Status:</label>
    <select name="cron_status" id="cron_status">
    	<option value="active" >Active</option>
        <option value="inactive" >InActive</option>
    </select><br>
<br>
	<p align=center >
    	<input type="submit" name="submit" value="Update This Cron"  />
    </p>
</form>
</div>