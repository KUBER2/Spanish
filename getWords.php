<?php
	
session_start();

require_once 'database.php';

$slowaQuery = $db->query('SELECT dictionary.Word, dictionary.Translation, category.Category FROM dictionary INNER JOIN category ON dictionary.Category=category.CategoryID');
$slowa =  $slowaQuery->fetchAll();

$pageNumber = filter_input(INPUT_POST, 'pageNumber', FILTER_VALIDATE_INT);
$wordsNumber = filter_input(INPUT_POST, 'wordsNumber', FILTER_VALIDATE_INT);

if($wordsNumber == NULL){   
  $wordsNumber = 10;
}
$firsWordNumber = 0;
if ($pageNumber>1){
  $firsWordNumber = ($pageNumber-1) * $wordsNumber-1;
}
$lastWordNumber = $firsWordNumber + $wordsNumber;

echo '<table class="table table-dark table-bordered">
<thead>
  <tr>
  <th>Słowo</th>
  <th>Tłumaczenie</th>
  <th>Kategoria</th>
  </tr>
</thead>
<tbody id="wordsTable">';

  for($i=$firsWordNumber; $i<$lastWordNumber;$i++){
    echo "<tr><td>{$slowa[$i]['slowo']}</td><td>{$slowa[$i]['tlumaczenie']}</td><td>{$slowa[$i]['kategoria']}</td></tr>";
  }				  
echo '</tbody></table>';

?>