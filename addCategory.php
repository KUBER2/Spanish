<?php

session_start();
require_once 'utilies/database.php';

//protection against sneaking in
if(!isset($_SESSION['logged_id'])){
	header('Location: adminLog.php');
	exit();
}

if((!isset($_POST['category']))){
	$_SESSION['errMsg']='Proszę podać kategorię';
	header('Location: adminPanel.php');
	exit();
}

try{
	
	$category = filter_input (INPUT_POST, 'category');
	$getCategoryQuery = $db->prepare('SELECT `Category` FROM `category` WHERE `Category` = :category');
	$getCategoryQuery->bindValue(':category', $category, PDO::PARAM_STR);
	$getCategoryQuery->execute();
	$categoryArray = $getCategoryQuery->fetch();
  	if(count($categoryIdArray)>0){
    	$_SESSION['errMsg']="Kategoria: $category znajduje się juz w bazie danych";
		header('Location: adminPanel.php');
		exit();
  	}	
	$addCategoryQuery = $db->prepare('INSERT INTO category (Category, AddBy) VALUES (:category, :AddBy)');
	$addCategoryQuery->bindValue(':AddBy', $_SESSION['logged_id'], PDO::PARAM_STR);
	$addCategoryQuery->bindValue(':category', $category, PDO::PARAM_STR);
	$addCategoryQuery->execute();
	$lastCategoryQuery = $db->query('SELECT * FROM category ORDER BY CategoryID DESC LIMIT 1');
	$lastCategory =  $lastCategoryQuery->fetch();
    $_SESSION['successMsg']=' Dodałem: ' . $lastCategory['Category'];
    setcookie("buttonToActive","addCategoryButton");
	header('Location: adminPanel.php');
	exit();
	
}catch(PDOException $e){
	$_SESSION['errMsg']= $e->getMessage();
	//$_SESSION['errDetail']="słowo: $word tłumaczenie: $translation categoryID: $category PoS: $PoS";
	header('Location: adminPanel.php');
	exit();
}


?>