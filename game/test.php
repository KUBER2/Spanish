
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hiszpański</title>
    <meta charset="utf-8">
    <meta name="Stona Jakub Rola" content="Język hiszpański nauka" />
	<meta name="keywords" content="Jakub Rola, Hiszpański, nauka języka" />
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="../css/style.css" type="text/css"/>
	
	<script src="test.js"></script>
	
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
	
		<div class="alert alert-warning alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Uwaga!</strong><?php if (isset($_COOKIE['gameMsg'])) {
					print_r($_COOKIE['gameMsg']);	unset($_COOKIE['gameMsg']);
					setcookie('gameMsg', '', time() - 3600, '/'); }?>
		</div>
	
		
<?php

echo '<br/>';
print_r($_COOKIE['question']);
echo '<br/>';
print_r($_COOKIE['answer']);
echo '<br/>';

if (isset($_COOKIE['gameMsg'])) {
	print_r($_COOKIE['gameMsg']);
    unset($_COOKIE['gameMsg']);
    setcookie('gameMsg', '', time() - 3600, '/'); // empty value and old timestamp
}
?>
		
		<div id="quiz">
		
		
		</div>
		
		<button type="button" class="btn" id ="kliknij">Kliknij</button>
		
	</div>
	
	
	
	<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-bottom">
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
				<a class="nav-link" href="gameOption.php">Powrtót do wyboru ćwiczenia</a>
			  </li>
			        
			</ul>
		  </div>  
	</nav>
	


</body>
</html>



