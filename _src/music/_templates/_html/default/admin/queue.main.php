<?php
	$status = (isset($_GET['status'])) ? $_GET['status'] : "pending";
	$type 	= (isset($_GET['type']))	? $_GET['type']  : "all";
	
	
	
?>
<table width=100% >
        <thead>
            <tr>
                <th>Subject</th> 
                <th>Type</th> 			                 
                <th>Status</th>             
                <th>Action</th>
            </tr>
        </thead>
        <tbody >
<?php
		$sql = $db->get("mail_inbox","*");
		while($ht = $db->fetch($sql)) {
			echo "<tr group=".$ht['box_key']." id=tr".$ht['box_key']." >
			<td align=left class=left >&raquo; <a href='Javascript:void(0);' onclick='view_queue(".$ht['box_key'].");'>".$ht['box_title']."</a></td>
			<td>".$ht['box_type']."</td>			
			<td>".$ht['box_status']."</td>			
			<td> <a href='Javascript:void(0);' onclick='done_queue(".$ht['box_key'].");'>Delete / Completed</a> </td>			
			</tr>";
		}
?>		        
        </tbody>
</table>
<script language="javascript" >
function view_queue(key) {
	var url = _AJAX + "/admin/queue/view/?box_key=" + key;	
	$.get(url, function(data) {
		var x = $.parseJSON(data);			
			$("#view" + key).remove();
			var view = $(document.createElement("tr"));
			$(view).attr("id","view" + key);
			$(view).html("<td colspan=10 class=left align=left ><pre>" + x.html + "</pre></td>");
			$(view).insertAfter($("#tr" + key ));
	});
}

function done_queue(key) {
	
	$.get(_AJAX + "/admin/queue/delete/?box_key=" + key, function(data) {
		$("#view" + key).remove();
		$("#tr" + key ).fadeOut(1000);
		
	});
}
</script>