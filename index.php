<!DOCTYPE html>
<html>
	<head>
		<title>Book Marketplace</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="js/marquee.js"></script>
		<script src="js/searchbar.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" type="text/css" href="css/global.css">
	</head>

	<body>
		<marquee>Thanks for visiting so soon!
		But we are under construction
		Here is something to keep you happy until launch :)</marquee><br>

		<div class="header">
			<a  id="login-ling" href="login.php">Login</a>
			<a id="add-link" href="php/addBook.php">Lend/Sell</a>
	 	</div>


	 	<div id="logo">BC's MarketPlace</div>

	 	<div class="container">
	 		<div class="row">
	 	        <div class="col-sm-6 col-sm-offset-3">
	 	            <div id="imaginary_container"> 
	 	                <div class="input-group stylish-input-group">
	 	                    <input type="text" class="form-control"  placeholder="Search" 
	 	                    name="search-bar" id="search-bar-1" onkeyup="search(this.value)">
	 	                    <span class="input-group-addon">
	 	                        <button type="submit">
	 	                            <span class="glyphicon glyphicon-search"></span>
	 	                        </button>  
	 	                    </span>
	 	                </div>
	 	            </div>
	 	        </div>
	 		</div>
	 	</div>
	 	<div class="container">
	 		<div id="result">
	 		</div>
	 	</div>
	 	
	 	<footer class="panel-footer footer">
	 	    <div class="container">
		 	    <p class="text-muted">Designed by the people of BC for the People of BC</p>
	 	    </div>
 	    </footer>
	</body>
</html>