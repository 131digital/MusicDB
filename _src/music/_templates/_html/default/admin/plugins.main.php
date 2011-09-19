<?php
$action = (isset($_GET['action'])) ? $_GET['action'] : "show";
if($action == "run") {
	$this->run_plugins();
	$action = "show";
}
if($action == "edit") {
	$this->edit_plugins();
} else
if($action == "show") {
?>
    <table width=100% >
            <thead>
                <tr>
                    <th>Plugins Name</th> 			                 
                    <th>Description</th>
                    <th>Status</th>
                    <th>Run Every (Mins)</th>
                    <th>Last Update</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody >
    <?php
        echo $this->get_plugins();
    ?>
            </tbody>
    </table>
<?php
	}
?>
