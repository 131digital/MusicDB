<form action="Javascript:void(0);" method="post" name="frmreport" id="frmreport" onSubmit="go_post('report/submit',this,'','');">
	<label> Subject: </label>
    	<input type="text" name="subject" value="{subject}" class="tiptip-top" title="Enter a subject for this email / report." >
    <label> URL: </label>
    	<input type="text" name="url" value="{refer}" class="tiptip-top" title="This is URL you will report." >  
    <label> Category: </label>
  		<select name="type" class="tiptip-top" title="Pick a category for this report" >
        	<option value="Broken Links"> Broken Links </option>
        	<option value="Wrong Video"> Wrong Video </option>
        	<option value="DMCA Report"> DMCA Report </option>
        	<option value="Can't Buy Mp3"> Can't Buy Mp3 </option>  
        	<option value="Bad Quality"> Bad Quality </option>                                              
        	<option value="Wrong Lyrics / Chord"> Wrong Lyrics / Chords </option>   
        	<option value="Request Lyrics / Chord"> Request Lyrics / Chords </option>                     
        </select> <br>
	<label > Your Messages: </label>
    	<textarea name="message" id="message" rows=5 class="tiptip-top" title="Enter your message here!"></textarea>   <br>
	<label > Are You Human: <img src="{URL}/?capcha=show"  /> </label>
    	<input type="text" name="capcha" id="capcha" value=""  class="tiptip-top" title="Please enter the result of Ani Spam - Are You Human" > <br>
    <label > Your E-Mail: </label>
    	<input type="text" name="email" id="email" class="tiptip-top" title="We need your email, thank you." > <br>
	<p align=center >
    	<input type="submit" name="submit" value="Submit Report" >
    </p>        
    	        
</form>