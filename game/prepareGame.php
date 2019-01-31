<?php


require_once '../database.php';
$category = filter_input(INPUT_POST, 'categorySelect');
$questionNambers = filter_input(INPUT_POST, 'numberSelect');
$getWordsQuery = $db->prepare("SELECT slowo, tlumaczenie, czescMowy  FROM `slownik` WHERE kategoria = :category");
$getWordsQuery->bindValue(':category', $category, PDO::PARAM_STR);
$getWordsQuery->execute();
$words = $getWordsQuery->fetchAll();
$numberOfRows = $getWordsQuery->rowCount();

if($numberOfRows < $questionNambers){
	setcookie("gameMsg","Niestety w bazie jest mniej wyrazów niż zaznaczyłeś.");
	$questionNambers = $numberOfRows;
}
setcookie("numberOfQuestions",$questionNambers);
//unseting previous cookies
if (isset($_COOKIE['question'])) {
	unset($_COOKIE['question']);
    setcookie('question', '', time() - 3600, '/'); // empty value and old timestamp
}
if (isset($_COOKIE['answer'])) {
	unset($_COOKIE['answer']);
    setcookie('answer', '', time() - 3600, '/'); // empty value and old timestamp
}

for($i=0;$i<$numberOfRows;$i++){
	$cookieKeySpanish = "spanishWord[" . $i ."]"; 
	$cookieKeyPolish = "polishWord[" . $i ."]"; 
	setcookie($cookieKeySpanish, $words[$i]['slowo']);
	setcookie($cookieKeyPolish, $words[$i]['tlumaczenie']);
}
header('Location: game.php');
exit();

?>





