<?php
session_start();
require_once 'utilies/database.php';

if(!isset($_SESSION['logged_id'])){

	if(isset($_POST['login'])){
		
		$login = filter_input(INPUT_POST, 'login');
		$password = filter_input(INPUT_POST, 'pswd');
		
		
		$userQuery = $db->prepare('SELECT AdminID, password FROM admins where login = :login');
		$userQuery->bindValue(':login', $login, PDO::PARAM_STR);
		$userQuery->execute();
		
		$user = $userQuery->fetch();
		//echo $user['id'] . " " . $user['password'].$_POST['pswd'];
		
		if($user && password_verify($password,$user['password'])){
			$_SESSION['logged_id']=$user['AdminID'];
			unset($_SESSION['bad_attempt']);
		}else{
			$_SESSION['bad_attempt'] = true;
			header('Location: adminLog.php');
			exit();
		}
		
	}else{
		header('loacation: adminLog.php');
		exit();
	}
}

$categorysQuery = $db->query('SELECT category FROM category');
$categorys =  $categorysQuery->fetchAll();

$partsOfSpeechQuery = $db->query('SELECT PartOfSpeech FROM partofspeech');
$partsOfSpeech =  $partsOfSpeechQuery->fetchAll();


?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <title>Panel admina</title>
  <meta charset="utf-8">
  <meta name="Stona Jakub Rola" content="Język hiszpański nauka" />
	<meta name="keywords" content="Jakub Rola, Hiszpański, nauka języka" />
	
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<link rel="stylesheet" href="css/style.css" type="text/css"/>

</head>
<body class="bg-dark">

	<div class="container">		
		<nav>
      <div class="row">
        <div class = "col-sm-12 p-4 m-2">
          <!-- Nav pills -->
          <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#addWord">Dodaj słowo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#addCategory">Dodaj kategorie</a>
            </li>
            
          </ul>
        </div>
      </div>
		</nav>

    <div class="row">
      <div class="col-sm-3">
        <h4>Widaomości:</h4>			
      </div>
      <!-- Tab panes -->
      <div class="tab-content col-sm-6">
        <div id="addWord" class="container tab-pane active mt-2"> <!-- Adding word tab -->
          <div>					
            <?php //Display message if last action has been succeeded
              if(isset($_SESSION['successMsg'])){
                echo '<div class="alert alert-success alert-dismissible"><strong>Success!</strong>' . $_SESSION['successMsg'] . '</div>';
                unset($_SESSION['successMsg']);
              }
            ?>
          </div>	
          <form action="addWord.php" method="post">
            <div class="form-group">
              <label for="word">Słowo po hiszpańsku:</label>
              <input type="text" class="form-control" id="word" name="word">
            </div>
                
            <div class="form-group">
              <label for="translation">Tłumaczenie:</label>
              <input type="text" class="form-control" id="translation" name="translation">
            </div>
                
            <div class="form-group">
              <label for="category">Wybierz kategorie:</label>
              <select class="form-control" id="category" name="category">
                <?php
                  foreach($categorys as $category){
                  echo '<option>'  . $category['category'] .'</option>';
                  //print_r($category['category']);
                  }										
                ?>
              </select>
            </div>							
            <div class="form-group">
              <label for="PartOfSpeech">Część mowy:</label>
                <div class="" id="PartOfSpeech">
                  <?php
                    $i=1;
                    foreach($partsOfSpeech as $POS){										
                      echo '<div class="form-check-inline">';
                      echo '<label class="form-check-label" for="radio'.$i.'">';
                      echo '<input type="radio" class="form-check-input" id="radio'.$i.'" name="PoS" value="'.$POS['PartOfSpeech'].'" >'.$POS['PartOfSpeech'].'';
                      echo '</label></div>';
                    }
                  ?>		
                </div>								
            </div>							
                
            <button type="submit" class="btn btn-success btn-block">Dodaj</button>
                
            <div  class="w-100 bg-danger p-2" id="allert">
              <p>
                <?php 	
                  if(isset($_SESSION['errMsg'])){
                    echo '<script> document.getElementById("allert").style.display = "block"</script>';
                    echo $_SESSION['errMsg'] . $_SESSION['errDetail'];
                    unset($_SESSION['errMsg']);
                  }else{
                    
                  }
                  ?>
              </p>
            </div>
              
          </form>
        </div>
            
          <div id="addCategory" class="container tab-pane fade"> <!-- add category tab --><br> 
                  
          </div>          
        </div>
        <div class="col-sm-3">
          <h4>Ostanio:</h4>        
        </div>
      </div>
	</div>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
