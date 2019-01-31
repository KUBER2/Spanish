<?php

/*
require_once '../databaseAdmin.php';
$category = filter_input(INPUT_POST, 'categorySelect');
$questionNambers = filter_input(INPUT_POST, 'numberSelect');
$getWordsQuery = $dbA->prepare("SELECT slowo, tlumaczenie, czescMowy  FROM `slownik` WHERE kategoria = :category");
$getWordsQuery->bindValue(':category', $category, PDO::PARAM_STR);
$getWordsQuery->execute();
$words = $getWordsQuery->fetchAll();


if(($getWordsQuery->rowCount())<$questionNambers){
	setcookie("gameMsg","Niestety w bazie jest mniej wyrazów niż zaznaczyłeś.");
	$questionNambers = $getWordsQuery->rowCount();
}
for($i=0;$i<$questionNambers;$i++){
	$cookieKeyQuestion = "question[" . $i ."]"; 
	$cookieKeyAnswer = "answer[" . $i ."]"; 
	setcookie($cookieKeyQuestion ,$words[$i]['slowo']);
	setcookie($cookieKeyAnswer,$words[$i]['tlumaczenie']);
}
*/
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Hiszpański</title>
    <meta charset="utf-8">
    <meta name="Stona Jakub Rola" content="Język hiszpański nauka" />
	<meta name="keywords" content="Jakub Rola, Hiszpański, nauka języka" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
	   	
	
	<link rel="stylesheet" href="../css/style.css" type="text/css"/>
	
</head>
<body class="bg-dark" >

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

	
	<div class="container mb-5">
	
		
		<?php 
			if (isset($_COOKIE['gameMsg'])) {
				echo '<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Uwaga! </strong>';
				print_r($_COOKIE['gameMsg']);	unset($_COOKIE['gameMsg']);
				setcookie('gameMsg', '', time() - 3600, '/'); 
				echo '</div>';}
		?>	
		

		
		<div class = "mx-auto border border-4 p-4 col-md-10 col-lg-8 invisible" id = "quiz"></div>
		
		<div class = "mx-auto col-md-8 m-3 p-4">
			<div id = "mesageDiv" style="display:none" class ="p-4 mb-4 text-warning">
				<p id = "mesageParagraf" style="display:none"></p>
			</div>
			<button type="button" class="btn btn-block" id = "spanishPolish"> Z hiszpańskie na polskie </button>
			<button type="button" class="btn btn-block" id = "polishSpanish"> Z polskiego na hiszpański </button>
			<button type="button" class="btn btn-block" style="display:none" id = "checkButton">Sprawdz</button>
		</div>	

		
		<div style = "height:56px;"></div>

		
		
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
	

	<script src="testGenerate.js"></script> 
	<script src="testCheck.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>



