<?php


require_once 'database.php';

function isWordInDataBase($wordIn){  
  
  $word = filter_var($wordIn, FILTER_SANITIZE_STRING);  
  $getWordQuery = $db->prepare('SELECT `Word` FROM `dictionary` WHERE `Word` = :word');
  $getWordQuery->bindValue(':word', $word, PDO::PARAM_STR);
  $getWordQuery->execute();
  $WordFromDB = $getWordQuery->fetch();
  if($WordFromDB){
    return true;
  }else{
    return false;
  }

}
?>