<!DOCTYPE html>
<html>
	<head>
		<title>Place Holder</title>
	</head>
	<body>
		<?php
			echo "this is a place holder<br>";
			echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		?>
		<form>
			<input type="text" value="this is a test">
		</form>
	</body>
</html>