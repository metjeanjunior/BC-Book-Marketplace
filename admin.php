<?php
include("include/dbconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Marketplace</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<style type="text/css">
		body { background-color: Maroon; color: white; }
	</style>
</head>
<body>
	<div id="admin">
		Admin Page
	</div>
<?php
	if ( isset( $_POST['submitAddDepartment'] ) )
		handleAddDepartmentForm()
	displayAddDepartmentForm();
	if ( isset( $_POST['button'] ) )
		handleform();
	displayform();
	if ( isset( $_POST['button'] ) )
		handleform();
	displayform();
	if ( isset( $_POST['button'] ) )
		handleform();
	displayform();
	if ( isset( $_POST['button'] ) )
		handleform();
	displayform();
	if ( isset( $_POST['button'] ) )
		handleform();
	displayform();
	if ( isset( $_POST['button'] ) )
		handleform();
	displayform();
?>
</body>
</html>
<script type="text/javascript" src="js/validate.js"> </script>
<?php
function displayAddDepartmentForm(){
?>
<div>
<br><br><br>
<form name="addDepartment" action="" onsubmit="return validateForm();" method="post">
Department: <input type="text" name="department" value="" />
<span id="dMSG" class="warning"></span><br>
<input type="submit" name="submitAddDepartment" value="Submit" />
</form>
</div>
<?php
}
function handleAddDepartmentForm(){
	$department = $_POST['department'];
	$query = "insert into department (department_name) values ('$department');";
	$dbname = "metelusj";
	$dbc = @connect_to_db($dbname);
	$result = @perform_query($dbc, $query);
	echo "$department";
	disconnect_from_db($dbc, $result );
}
?>