<?php
include("../include/dbconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Marketplace</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/global.css" />
	<link rel="stylesheet" type="text/css" href="../css/admin.css" />
</head>
<body>
	<div id="admin">Admin Page</div>
<?php
	if ( isset( $_POST['submitEmail'] ) )
		handleEmailForm();
	displayEmailForm();
	if ( isset( $_POST['submitNewAdmin'] ) )
		handleNewAdminForm();
	displayNewAdminForm();
	if ( isset( $_POST['submitRemoveBook'] ) )
		handleRemoveBookForm();
	displayRemoveBookForm();
	if ( isset( $_POST['submitRemoveUser'] ) )
		handleRemoveUserForm();
	displayRemoveUserForm();
	if ( isset( $_POST['submitRemoveAdmin'] ) )
		handleRemoveAdminForm();
	displayRemoveAdminForm();
?>
</body>
</html>
<script type="text/javascript" src="../js/validate.js"> </script>
<?php
function displayEmailForm(){
?>
<div>
<br><br><br>
<form name="emailF" class="form-horizontal" onsubmit="return validateEmail();" method="post">
  <fieldset>
    <legend><font color="white">Email a User</font></legend>
    <div class="form-group">
      <label for="inputSubject" class="col-lg-2 control-label">Subject</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="subject" value="">
      </div>
      <style>#sEMSG{text-align:center;}</style>
      <span id="sEMSG" class="warning"></span><br>
    </div>
    <div class="form-group">
	  <label for="inputMessage" class="col-lg-2 control-label">Message</label>
	  <div class="col-lg-10">
	  	<textarea name="message" class="form-control" value="" rows="4" cols="50"></textarea>
	  </div>
	  <style>#mEMSG{text-align:center;}</style>
	  <span id="mEMSG" class="warning"></span><br>
    </div>
    <div class="form-group">
	  <label for="inputReceiver" class="col-lg-2 control-label">Receiver Email</label>
	  <div class="col-lg-10">
	    <input type="text" class="form-control" name="receiver" value="">
	  </div>
	  <style>#rEMSG{text-align:center;}</style>
	  <span id="rEMSG" class="warning"></span><br>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      	<input type="submit" name="submitRemoveBook" class="btn btn-primary" value="Submit" />
      </div>
    </div>
  </fieldset>
</form>
</div>
<?php
}
function handleEmailForm(){
	$subject = $_POST['subject'];
	$receiver = $_POST['receiver'];
	$message = $_POST['message'];
	$queryEmails = "SELECT customer_email FROM customer WHERE customer_email = '$receiver';";
	$dbname = "metelusj";
	$dbc = @connect_to_db($dbname);
	$resultEmails = @perform_query($dbc, $queryEmails);
	while($row = @mysqli_fetch_array($resultEmails, MYSQLI_ASSOC))
	{
		$email = $row['customer_email'];
		mail($email,$subject,$message);
	}
	@disconnect_from_db($dbc, $result );
}
function displayNewAdminForm(){
?>
<div>
<br><br><br>
<form name="newAdmin" class="form-horizontal" onsubmit="return validateNewAdmin();" method="post">
  <fieldset>
    <legend><font color="white">New Admin</font></legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="adminEmail" value="">
      </div>
      <style>#eAMSG{text-align:center;}</style>
      <span id="eAMSG" class="warning"></span><br>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" name="adminPassword" value="">
      </div>
      <style>#pAMSG{text-align:center;}</style>
      <span id="pAMSG" class="warning"></span><br>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      	<input type="submit" name="submitNewAdmin" class="btn btn-primary" value="Submit" />
      </div>
    </div>
  </fieldset>
</form>
</div>
<?php
}
function handleNewAdminForm(){
	$password = $_POST['adminPassword'];
	$email = $_POST['adminEmail'];
	$query = "insert into admin
	(admin_password, admin_email, admin_date_joined)
	values (SHA1('$password'), '$email', CURDATE());";
	$dbname = "metelusj";
	$dbc = @connect_to_db($dbname);
	$result = @perform_query($dbc, $query);
	echo "$email";
	@disconnect_from_db($dbc, $result );
}
function displayRemoveBookForm(){
?>
<div>
<br><br><br>
<form name="removeBook" class="form-horizontal" onsubmit="return validateRemoveBook();" method="post">
  <fieldset>
    <legend><font color="white">Remove Book</font></legend>
    <div class="form-group">
      <label for="inputBookName" class="col-lg-2 control-label">Book Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="bookName" value="">
      </div>
      <style>#bMSG{text-align:center;}</style>
      <span id="bMSG" class="warning"></span><br>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      	<input type="submit" name="submitRemoveBook" class="btn btn-primary" value="Submit" />
      </div>
    </div>
  </fieldset>
</form>
</div>
<?php
}
function handleRemoveBookForm(){
	$bookName = $_POST['bookName'];
	$query = "delete from book where book_name = '$bookName';";
	$dbname = "metelusj";
	$dbc = @connect_to_db($dbname);
	$result = @perform_query($dbc,$query);
	echo "$bookName";
	@disconnect_from_db($dbc,$result);
}
function displayRemoveUserForm(){
?>
<div>
<br><br><br>
<form name="removeUser" class="form-horizontal" onsubmit="return validateRemoveUser();" method="post">
  <fieldset>
    <legend><font color="white">Remove User</font></legend>
    <div class="form-group">
      <label for="inputUserName" class="col-lg-2 control-label">User Email</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="userName" value="">
      </div>
      <style>#uMSG{text-align:center;}</style>
      <span id="uMSG" class="warning"></span><br>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      	<input type="submit" name="submitRemoveUser" class="btn btn-primary" value="Submit" />
      </div>
    </div>
  </fieldset>
</form>
</div>
<?php
}
function handleRemoveUserForm(){
	$username = $_POST['userName'];
	$query = "delete from customer where customer_email = '$username';";
	$dbname = "metelusj";
	$dbc = @connect_to_db($dbname);
	$result = @perform_query($dbc, $query);
	echo "$username";
	@disconnect_from_db($dbc, $result );
}
function displayRemoveAdminForm(){
?>
<div>
<br><br><br>
<form name="removeAdmin" class="form-horizontal" onsubmit="return validateRemoveAdmin();" method="post">
  <fieldset>
    <legend><font color="white">Remove Admin</font></legend>
    <div class="form-group">
      <label for="inputAName" class="col-lg-2 control-label">Admin Email</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="aUsername" value="">
      </div>
      <style>#aMSG{text-align:center;}</style>
      <span id="aMSG" class="warning"></span><br>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      	<input type="submit" name="submitRemoveAdmin" class="btn btn-primary" value="Submit" />
      </div>
    </div>
  </fieldset>
</form>
</div>
<?php
}
function handleRemoveAdminForm(){
	$username = $_POST['aUsername'];
	$query = "delete from admin where admin_email = '$username';";
	$dbname = "metelusj";
	$dbc = @connect_to_db($dbname);
	$result = @perform_query($dbc, $query);
	echo "$username";
	@disconnect_from_db($dbc, $result );
}
?>