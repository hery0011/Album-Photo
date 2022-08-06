<?php 
session_start();
if(isset($_SESSION['id']) && !is_null($_SESSION['id'])) {
	session_destroy();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
	<title></title>
	<style type="text/css">
		body{
			background-image: url('photo/fond.jpg');
		}
	</style>
</head>
<body>
	<div class="row" style="margin-top:200px">
		<div class="col-md-4"></div>
		<div class="col-md-4 cadre">
			<h2 style="text-align:center">se connecter</h2>
		
			<form method="POST" action="login.php">
				<div>
					<input type="text" name="mail" class="form-control mb-3" placeholder="votre mail">
				</div>
				<div>
					<input type="text" name="mdp" class="form-control" placeholder="votre password">
				</div>
				<input type="submit" name="" value="se connecter" class="btn btn-primary mt-2 mb-3">
			</form>

			<div>
				<a href="creationCompte.html" style="color:white;">création compte</a>
			</div>
		</div>
		
		<div class="col-md-4"></div>
	</div>
</body>
</html>