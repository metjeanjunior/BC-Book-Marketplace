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
		handleAddDepartmentForm();
	displayAddDepartmentForm();
	if ( isset( $_POST['submitAddProfessor'] ) )
		handleAddProfessorForm();
	displayAddProfessorForm();
	if ( isset( $_POST['submitNewAdmin'] ) )
		handleNewAdminForm();
	displayNewAdminForm();
	if ( isset( $_POST['submitAddClass'] ) )
		handleAddClassForm();
	displayAddClassForm();
	if ( isset( $_POST['submitAddBook'] ) )
		handleAddBookForm();
	displayAddBookForm();
	if ( isset( $_POST['submitRemoveBook'] ) )
		handleRemoveBookForm();
	displayRemoveBookForm();
	if ( isset( $_POST['submitRemoveUser'] ) )
		handleRemoveUserForm();
	displayRemoveUserForm();
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
function displayAddProfessorForm(){
?>
<div>
<br><br><br>
<form name="addDepartment" action="" onsubmit="return validateForm();" method="post">
First Name: <input type="text" name="firstName" value="" />
<span id="fMSG" class="warning"></span><br>
Last Name: <input type="text" name="lastName" value="" />
<span id="lMSG" class="warning"></span><br>
Department: <select name="department" id="departments">
	<option value="Need to add loop">Needs loop</option>";
	<option value="CS">CS</option>";
	<option value="Biology">Biology</option>";
	<option value="Linguistics">Linguistics</option>";
</select> <br>
<input type="submit" name="submitAddProfessor" value="Submit" />
</form>
</div>
<?php
}
function handleAddProfessorForm(){
	$department = $_POST['department'];
	$query = "insert into department (department_name) values ('$department');";
	$dbname = "metelusj";
	$dbc = @connect_to_db($dbname);
	$result = @perform_query($dbc, $query);
	echo "$department";
	disconnect_from_db($dbc, $result );
}
function displayNewAdminForm(){
?>
<div>
<br><br><br>
<form name="addDepartment" action="" onsubmit="return validateForm();" method="post">
First Name: <input type="text" name="firstName" value="" />
<span id="fAMSG" class="warning"></span><br>
Last Name: <input type="text" name="adminLastName" value="" />
<span id="lAMSG" class="warning"></span><br>
Email: <input type="text" name="adminEmail" value="" />
<span id="eAMSG" class="warning"></span><br>
Username: <input type="text" name="username" value="" />
<span id="uAMSG" class="warning"></span><br>
Password: <input type="password" name="lastName" value="" />
<span id="pAMSG" class="warning"></span><br>
<input type="submit" name="submitNewAdmin" value="Submit" />
</form>
</div>
<?php
}
function handleNewAdminForm(){
	$department = $_POST['department'];
	$query = "insert into department (department_name) values ('$department');";
	$dbname = "metelusj";
	$dbc = @connect_to_db($dbname);
	$result = @perform_query($dbc, $query);
	echo "$department";
	disconnect_from_db($dbc, $result );
}
function displayAddClassForm(){
?>
<div>
<br><br><br>
<form name="addDepartment" action="" onsubmit="return validateForm();" method="post">
Class Name: <input type="text" name="className" value="" />
<span id="nCMSG" class="warning"></span><br>
Class Description: <input type="text" name="description" value="" />
<span id="dCMSG" class="warning"></span><br>
<input type="submit" name="submitAddClass" value="Submit" />
</form>
</div>
<?php
}
function handleAddClassForm(){
	$department = $_POST['department'];
	$query = "insert into department (department_name) values ('$department');";
	$dbname = "metelusj";
	$dbc = @connect_to_db($dbname);
	$result = @perform_query($dbc, $query);
	echo "$department";
	disconnect_from_db($dbc, $result );
}
function displayAddBookForm(){
?>
<div>
<br><br><br>
<form name="addDepartment" action="" onsubmit="return validateForm();" method="post">
Book Name: <input type="text" name="firstName" value="" />
<span id="nBMSG" class="warning"></span><br>
Book Description: <input type="text" name="lastName" value="" />
<span id="dBMSG" class="warning"></span><br>
Category: <select name="cateogry" id="categories">
	<option value="Need to add loop">Needs loop</option>";
	<option value="cat1">cat1</option>";
	<option value="cat2">cat2</option>";
	<option value="cat3">cat3</option>";
</select> <br>
<input type="submit" name="submitAddBook" value="Submit" />
</form>
</div>
<?php
}
function handleAddBookForm(){
	$department = $_POST['department'];
	$query = "insert into department (department_name) values ('$department');";
	$dbname = "metelusj";
	$dbc = @connect_to_db($dbname);
	$result = @perform_query($dbc, $query);
	echo "$department";
	disconnect_from_db($dbc, $result );
}
function displayRemoveBookForm(){
?>
<div>
<br><br><br>
<form name="addDepartment" action="" onsubmit="return validateForm();" method="post">
First Name: <input type="text" name="firstName" value="" />
<span id="fMSG" class="warning"></span><br>
Last Name: <input type="text" name="lastName" value="" />
<span id="lMSG" class="warning"></span><br>
Department: <select name="department" id="departments">
	<option value="Need to add loop">Needs loop</option>";
	<option value="CS">CS</option>";
	<option value="Biology">Biology</option>";
	<option value="Linguistics">Linguistics</option>";
</select> <br>
<input type="submit" name="submitRemoveBook" value="Submit" />
</form>
</div>
<?php
}
function handleRemoveBookForm(){
	$department = $_POST['department'];
	$query = "insert into department (department_name) values ('$department');";
	$dbname = "metelusj";
	$dbc = @connect_to_db($dbname);
	$result = @perform_query($dbc, $query);
	echo "$department";
	disconnect_from_db($dbc, $result );
}
function displayRemoveUserForm(){
?>
<div>
<br><br><br>
<form name="addDepartment" action="" onsubmit="return validateForm();" method="post">
First Name: <input type="text" name="firstName" value="" />
<span id="fMSG" class="warning"></span><br>
Last Name: <input type="text" name="lastName" value="" />
<span id="lMSG" class="warning"></span><br>
Department: <select name="department" id="departments">
	<option value="Need to add loop">Needs loop</option>";
	<option value="CS">CS</option>";
	<option value="Biology">Biology</option>";
	<option value="Linguistics">Linguistics</option>";
</select> <br>
<input type="submit" name="submitRemoveUser" value="Submit" />
</form>
</div>
<?php
}
function handleRemoveUserForm(){
	$department = $_POST['department'];
	$query = "insert into department (department_name) values ('$department');";
	$dbname = "metelusj";
	$dbc = @connect_to_db($dbname);
	$result = @perform_query($dbc, $query);
	echo "$department";
	disconnect_from_db($dbc, $result );
}
?>