<?php

//session_start();
require_once '../database.php';
$categoryQuery = $db->query('SELECT DISTINCT kategoria FROM slownik WHERE poziom = 1 and kategoria IS NOT null');
//$catogoryQuery->execute();
$categorys =  $categoryQuery->fetchAll();
$_SESSION['countCat'] = $categoryQuery->rowCount();
$randNumber = (rand(0,$_SESSION['countCat']-1));	
//print_r($categorys[$randNumber][0]);


?>