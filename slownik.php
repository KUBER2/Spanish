<?php
	
session_start();

require_once 'database.php';

$slowaQuery = $db->query('SELECT slowo, tlumaczenie, kategoria FROM slownik');
$slowa =  $slowaQuery->fetchAll();
//print_r($slowa);
?>
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
    <script src="JS/searchScript.js"></script>
	
	
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<body class="bg-dark">

	<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
		<a class="navbar-brand" href="#">Hiszpański</a>
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
			    <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
						Ćwiczenia
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="/hiszpanski/game/gameOption.php">Poziom 1</a>
						<a class="dropdown-item disabled" href="#">Poziom 2</a>
						<a class="dropdown-item disabled" href="#">Poziom 3</a>
					 </div>
				</li>    
			</ul>
		  </div>  
	</nav>
	

	<div class="container">
		<br/><br/>
		<p>
			<input class="form-control" id="searchScript" type="text" placeholder="Search..">
			<table class="table table-dark table-bordered">
				<thead>
				  <tr>
					<th>Słowo</th>
					<th>Tłumaczenie</th>
					<th>Kategoria</th>
				  </tr>
				</thead>
				<tbody id="wordsTable">
				  <?php
					foreach ($slowa as $slowo){
						echo "<tr><td>{$slowo['slowo']}</td><td>{$slowo['tlumaczenie']}</td><td>{$slowo['kategoria']}</td></tr>";
					}				  
				  ?>
				</tbody>
			</table>
		
	</div>
	


</body>
</html>
