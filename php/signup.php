<?php
	$username = $_POST['username']
	$password = sha1($_POST['password'])
	$email = $_POST['email'];

	if(isset($_GET['forgot-email']))
		checkEmail();

	function checkEmail()
	{
		$dbc = @mysqli_connect("localhost", "metelusj", "23JD5h5z", "csci2254")
			or $dbc = 'bad';

		if ($dbc == 'bad')
			echo null;
		
	}