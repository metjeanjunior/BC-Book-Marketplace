<?php
	$debug = 1;
	if ( 0 == checklogin( $_POST['inputEmail'], $_POST['inputPassword']))
	{
		header("Location: ../login.php?badPass=true");
	} 
	else 
	{ 
		
		// Store the login information in cookies	
		setcookie('loginCookieUser', $_POST['name']);
	  	header("Location: showcustomer.php");
	}
	// checklogin sees if an entry exists with the name password pair passed.
	// returns true if so, false otherwise.

	function checklogin($name, $passwd)
	{
		$dbc = connectToDB("jed");
		$encodepw = sha1($passwd);
		$result = performQuery($dbc, 
			"select * FROM pwdemo where name='$name' and pass='$encodepw'");
		$matches = mysqli_num_rows($result);
		mysqli_free_result($result);
		disconnectFromDB($dbc);
		return($matches == 1);
	}
	// Modified connectToDB takes database as an argument, returns database connection

	function connectToDB($database)
	{
		$dbc= @mysqli_connect("localhost", "jed", "dej", $database) or
						die("Connect failed: ". mysqli_connect_error());
		return ($dbc);
	}

	function disconnectFromDB($dbc)
	{
		mysqli_close($dbc);
	}
	// Modified PeformQuery, takes the database and query as arguments, returns result set

	function performQuery($dbc, $query)
	{
		//echo "My query is >$query< <br />";	
		$result = mysqli_query($dbc, $query) or die("bad query".mysqli_error($dbc));
		return ($result);
	}