<?php

session_start();

//protection against sneaking in
if(!isset($_SESSION['logged_id'])){
	header('Location: adminLog.php');
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

	<?PHP
	echo print_r($_POST);
	require_once 'utilies/database.php';		
	$category = filter_input(INPUT_POST, 'category');
	$getCategoryIdQuery = $db->prepare('SELECT `CategoryID` FROM `category` WHERE `Category` = :category');
	$getCategoryIdQuery->bindValue(':category', $category, PDO::PARAM_STR);
	$getCategoryIdQuery->execute();
	$categoryIdArrey = $getCategoryIdQuery->fetch();
	$categoryID = $categoryIdArrey[0];
	echo 'categoryArrey';
	print_r($categoryIdArrey);
	echo $categoryID;
?>
	

</body>
</html>
