<?php

session_start();
require_once 'utilies/database.php';

//protection against sneaking in
if(!isset($_SESSION['logged_id'])){
	header('Location: adminLog.php');
	exit();
}

if((!isset($_POST['word']))||(!isset($_POST['translation']))||(!isset($_POST['PoS']))){
	$_SESSION['errMsg']='Brakuje danych: pola "Słowo po hiszpańsku" i "Tłuamczenia" nie mogą być puste!';
	header('Location: adminPanel.php');
	exit();
}

try{
	
	$word = filter_input (INPUT_POST, 'word');
	$getWordQuery = $db->prepare('SELECT `Word` FROM `dictionary` WHERE `Word` = :word');
  	$getWordQuery->bindValue(':word', $word, PDO::PARAM_STR);
  	$getWordQuery->execute();
  	$WordFromDB = $getWordQuery->fetch();
  	if(count($WordFromDB)>0){
    	$_SESSION['errMsg']="Słowo: $word znajduje się juz w bazie danych";
		header('Location: adminPanel.php');
		exit();
  	}
	$translation = filter_input(INPUT_POST, 'translation');	
	$PoS = filter_input(INPUT_POST, 'PoS');		
	$category = filter_input(INPUT_POST, 'category');
	$getCategoryIdQuery = $db->prepare('SELECT `CategoryID` FROM `category` WHERE `Category` = :category');
	$getCategoryIdQuery->bindValue(':category', $category, PDO::PARAM_STR);
	$getCategoryIdQuery->execute();
	$categoryIdArrey = $getCategoryIdQuery->fetch();
	$categoryID = $categoryIdArrey[0];	
	$addWordQuery = $db->prepare('INSERT INTO dictionary (Word, Translation, Category, AddBy, PartOfSpeech) VALUES (:word, :translation, :categoryID, :AddBy, :PoS)');
	$addWordQuery->bindValue(':word', $word, PDO::PARAM_STR);
	$addWordQuery->bindValue(':PoS', $PoS, PDO::PARAM_STR);
	$addWordQuery->bindValue(':translation', $translation, PDO::PARAM_STR);
	$addWordQuery->bindValue(':AddBy', $_SESSION['logged_id'], PDO::PARAM_STR);
	$addWordQuery->bindValue(':categoryID', $categoryID, PDO::PARAM_INT);
	$addWordQuery->execute();
	$lastWordQuery = $db->query('SELECT * FROM dictionary ORDER BY WordID DESC LIMIT 1');
	$lastWord =  $lastWordQuery->fetch();
	$_SESSION['successMsg']=' Dodałem: ' . $lastWord['Word'];
	header('Location: adminPanel.php');
	exit();
	
}catch(PDOException $e){
	$_SESSION['errMsg']= $e->getMessage();
	//$_SESSION['errDetail']="słowo: $word tłumaczenie: $translation categoryID: $category PoS: $PoS";
	header('Location: adminPanel.php');
	exit();
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Panel admina</title>
    <meta charset="utf-8">
    <meta name="Stona Jakub Rola" content="Język hiszpański nauka" />
	<meta name="keywords" content="Jakub Rola, Hiszpański, nauka języka" />
	
</head>
<body>

	

	

</body>
</html>
