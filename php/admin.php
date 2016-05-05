<?php
  include("../include/dbconn.php");
  include '../include/forceLogin.php';

  $user = $_COOKIE['loginCookieUser'];
  $admin = "";
  $query = "SELECT admin_email FROM admin WHERE admin_email = '$user';";
  $dbname = "metelusj";
  $dbc = @connect_to_db($dbname);
  $result = @perform_query($dbc, $query);
  $row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
  $admin = $row['admin_email'];
  if($admin != $user)
  	header("Location: http://cscilab.bc.edu/~metelusj/marketplace/");
?>

<?php
// 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Marketplace</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/global.css" />
	<link rel="stylesheet" type="text/css" href="../css/admin.css" />
  <script src="js/searchbar.js"></script>
</head>
<body>
	<div>
    <marquee id="quote"></marquee><br>
		<a  href="../index.php">Home</a>
	</div>
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

	$dbnameCus = "metelusj";
	$dbcCus = @connect_to_db($dbnameCus);
	$queryCus = "SELECT customer_email FROM customer";
	$result = @perform_query($dbcCus, $queryCus);


?>
<div class="container">
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
		  	<select class="form-control" name="receiver">
		  		<option value="" disable selected>Select User Email</option>
		  		<?php while($row = mysqli_fetch_assoc($result)) { ?>
		  			<option value="<?php echo($row['customer_email'])?>"> <?php echo($row['customer_email'])?> </option> 
		  		<?php
		  		}
		  		@disconnect_from_db($dbcCus, $result);
		  		?>
		  	</select>
		  </div>
		  <style>#rEMSG{text-align:center;}</style>
		  <span id="rEMSG" class="warning"></span><br>
	    </div>
	    <div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	      	<input type="submit" name="submitEmail" class="btn btn-primary" value="Submit" />
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
	$queryAdmins = "SELECT admin_email FROM admin WHERE admin_email = '$receiver';";
	$dbname = "metelusj";
	$dbc = @connect_to_db($dbname);
	$resultEmail = @perform_query($dbc, $queryEmails);
	$resultAdmin = @perform_query($dbc, $queryAdmins);
	$row1 = @mysqli_fetch_array($resultEmail, MYSQLI_ASSOC);
	$row2 = @mysqli_fetch_array($resultAdmin, MYSQLI_ASSOC);
	$email = $row1['customer_email'];
	$admin = $row2['admin_email'];
	echo "$email $admin";
	mail($email,$subject,$message);
	mail($admin,$subject,$message);
	@disconnect_from_db($dbc, $resultEmail );
}
function displayNewAdminForm(){
?>	
<div class="container">
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
	$dbnameRmBook = "metelusj";
	$dbcRmBook = @connect_to_db($dbnameRmBook);
	$queryRmBook = "SELECT book_name FROM book ORDER BY book_id ASC";
	$result = @perform_query($dbcRmBook, $queryRmBook);


?>
<div class="container">
<br><br><br>
<form name="removeBook" class="form-horizontal" onsubmit="return validateRemoveBook();" method="post">
  <fieldset>
    <legend><font color="white">Remove Book</font></legend>
    <div class="form-group">
      <label for="inputBookName" class="col-lg-2 control-label">Book Name</label>
      <div class="col-lg-10">
		<select class="form-control" name="bookName">
			<option value="" disable selected>Select Book to Remove</option>
			<?php while($row = mysqli_fetch_assoc($result)) { ?>
				<option value="<?php echo($row['book_name'])?>"> <?php echo($row['book_name'])?> </option> 
			<?php
			}
			@disconnect_from_db($dbcRmBook, $result);
			?>
		</select>
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
	$dbnameRmUser = "metelusj";
	$dbcRmUser = @connect_to_db($dbnameRmUser);
	$queryRmUser = "SELECT customer_email FROM customer";
	$result = @perform_query($dbcRmUser, $queryRmUser);


?>
<div class="container">
<br><br><br>
<form name="removeUser" class="form-horizontal" onsubmit="return validateRemoveUser();" method="post">
  <fieldset>
    <legend><font color="white">Remove User</font></legend>
    <div class="form-group">
      <label for="inputUserName" class="col-lg-2 control-label">User Email</label>
      <div class="col-lg-10">
		<select class="form-control" name="userName">
			<option value="" disable selected>Select User to Remove</option>
			<?php while($row = mysqli_fetch_assoc($result)) { ?>
				<option value="<?php echo($row['customer_email'])?>"> <?php echo($row['customer_email'])?> </option> 
			<?php
			}
			@disconnect_from_db($dbcRmUser, $result);
			?>
		</select>
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
	$dbnameRmAdmin = "metelusj";
	$dbcRmAdmin = @connect_to_db($dbnameRmAdmin);
	$queryRmAdmin = "SELECT admin_email FROM admin";
	$result = @perform_query($dbcRmAdmin, $queryRmAdmin);


?>
<div class="container">
<br><br><br>
<form name="removeAdmin" class="form-horizontal" onsubmit="return validateRemoveAdmin();" method="post">
  <fieldset>
    <legend><font color="white">Remove Admin</font></legend>
    <div class="form-group">
      <label for="inputAName" class="col-lg-2 control-label">Admin Email</label>
      <div class="col-lg-10">
		<select class="form-control" name="aUsername">
			<option value="" disable selected>Select Admin to Remove</option>
			<?php while($row = mysqli_fetch_assoc($result)) { ?>
				<option value="<?php echo($row['admin_email'])?>"> <?php echo($row['admin_email'])?> </option> 
			<?php
			}
			@disconnect_from_db($dbcRmAdmin, $result);
			?>
		</select>
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