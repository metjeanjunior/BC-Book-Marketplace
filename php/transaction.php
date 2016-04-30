<!-- Inspired by: http://bootsnipp.com/snippets/featured/search-results -->
<!DOCTYPE html>
<html>
	<head>
		<title>Search Results</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="../js/marquee.js"></script>
		<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAPc_E2pw9Fncvre_WqLYBn0gUcNyXRI3w"></script> -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj6Vben8F5cr9oIo_SWpz5401oPBwoUpY"
			async defer></script>
		<script src="../js/transaction.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/global.css">
		<link rel="stylesheet" type="text/css" href="../css/transaction.css">
	</head>
	<body>
		<marquee>Thanks for visiting so soon!
		But we are under construction
		Here is something to keep you happy until launch :)</marquee><br>

		<!-- <div id="map" hidden="hidden"></div> -->
		<div id="map"></div>
		<button class="btn-primary" id="toggleButton" onclick="toggleMap();">Show/Hide Map</button>

	</body>
</html>
<?php
	