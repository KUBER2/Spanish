
<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Panel admina</title>
    <meta charset="utf-8">
   
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<body class="bg-dark">

	

	<div class="container">
		<div class="col-sm-6 offset-md-2 ">
			<form method="post" action="adminPanel.php">
				<div class="form-group">
					<label for="login">Login:</label>
					<input type="login" class="form-control" id="login" placeholder="Wpisz login" name="login">
				</div>
				<div class="form-group">
					<label for="pwd">Hasło:</label>
					<input type="password" class="form-control" id="pwd" placeholder="Wpisz hasło" name="pswd">
				</div>
				
				<button type="submit" class="btn btn-primary">Zaloguj</button>
			</form>
		</div>
	</div>
	
	

</body>
</html>
