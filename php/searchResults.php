<!-- Inspired by: http://bootsnipp.com/snippets/featured/search-results -->
<!DOCTYPE html>
<html>
	<head>
		<title>Search Results</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="../js/marquee.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/global.css">
	</head>
	<body>
		<marquee>Thanks for visiting so soon!
		But we are under construction
		Here is something to keep you happy until launch :)</marquee><br>

		<div class="container">
	 		<div class="row">
	 			<form method="get" action="php/searchResults.php">
		 	        <div class="col-sm-6 col-sm-offset-3">
		 	            <div id="imaginary_container"> 
		 	                <div class="input-group stylish-input-group">
		 	                    <input type="text" class="form-control" name="searchVal" placeholder="Search" >
		 	                    <span class="input-group-addon">
		 	                        <button type="submit" onclick="">
		 	                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
		 	                        </button>  
		 	                    </span>
		 	                </div>
		 	            </div>
		 	        </div>
	 			</form>
	 		</div>
	 	</div>

	</body>
</html>
<?php
	