<?php
	
session_start();
require_once '../database.php';
require_once 'prepareData.php';


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Hiszpański</title>
    <meta charset="utf-8">
    <meta name="Stona Jakub Rola" content="Język hiszpański nauka" />
	<meta name="keywords" content="Jakub Rola, Hiszpański, nauka języka" />
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>
    
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">
	<link rel="stylesheet" href="../css/style.css" type="text/css"/>
</head>
<body class="bg-dark">

	



	<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
		<a class="navbar-brand" href="..\hiszpanski.php">Hiszpański</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
			  <li class="nav-item">
				<a class="nav-link" href="#">Słownik</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Gramatyka</a>
			  </li>
			    <li class="nav-item dropdown active">
					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
						Ćwiczenia
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Poziom 1</a>
						<a class="dropdown-item" href="#">Poziom 2</a>
						<a class="dropdown-item" href="#">Poziom 3</a>
					 </div>
				</li>    
			</ul>
		  </div>  
	</nav>
	

	<div class="container">
		
		<div>
			<form action="prepareGame.php" method = "post">
				
				<div class="form-group">
					<label for="categorySelect">Wybierz kategorię:</label>
					<select class="form-control" name="categorySelect" id="categorySelect">
					<?php
						foreach($categorys as $cat){
							echo '<option>' . $cat[0] .'</option>';	
						}
					?>
					</select>						
				</div>
				
				<div class="form-group">
					<label for="numberSelect">Wybierz ilość pytań:</label>
					<select class="form-control" name="numberSelect" id="numberSelect">
					
						<option>5</option>	
						<option>10</option>	
						<option>15</option>	
					
					</select>						
				</div>
				
				<button type="submit" class="btn btn-success btn-block">Graj</button>
			
			</form>
				
		</div>
		
		
	</div>
	
	<!-- START Bootstrap-Cookie-Alert -->
	<div class="alert text-center cookiealert" role="alert">
		<b>Do you like cookies?</b> &#x1F36A; We use cookies to ensure you get the best experience on our website. <a href="https://cookiesandyou.com/" target="_blank">Learn more</a>

		<button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">
			I agree
		</button>
	</div>
	<!-- END Bootstrap-Cookie-Alert -->	

	<script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>

</body>
</html>
