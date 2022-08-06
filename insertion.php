<?php 
	/*session start*/
	session_start();
	if(isset($_SESSION['id']) && !is_null($_SESSION['id'])) {
		$UserId = $_SESSION['id'];
	} else {
		header('location: index.php');
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
			background-image: url('photo/fond2.png');
		}
	</style>
</head>
<body>
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			 
			  <!-- Links -->
			  <ul class="navbar-nav">
			  	<li class="nav-item" style="text-align:left;">
			      <a class="nav-link btn btn-danger" href="index.php">Quiter</a>
			    </li>&nbsp;
			    <li class="nav-item">
			      <a class="nav-link btn btn-primary" href="insertion.php">Insertion Photo</a>
			    </li>&nbsp;
			    <li class="nav-item">
			      <a class="nav-link btn btn-primary" href="affichage.php">Voir mon album</a>
			    </li>
			  </ul>
			</nav>
		</div>
	</div>

	<div class="row" style="margin-top: 100px;">
		<div class="col-md-4"></div>
		<div class="col-md-4 mt-3 cadre">

			<h3 style="text-align: center; color: white;" class="mt-3">Enregistre ici votre photo</h3>

			<form method="POST" action="traitementInsertion.php" enctype="multipart/form-data">
				<div>
					<input type="file" name="fichier" class="mt-4">
				</div>
				<div>
					<input type="text" name="motCle" class="form-control mt-2" placeholder="mot clé">
				</div>
				<input type="submit" name="" value="Enregistrer" class="btn btn-primary form-control mt-3 mb-5">
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>