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

	<div class="container">
	  <ul class="nav nav-tabs">
	    <li class="nav-item">
	      <a class="nav-link" href="index.php">déconnexion</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link active" href="insertion.php">Insertion</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="affichage.php">Album</a>
	    </li>
	  </ul>
	</div>

	<form method="POST" action="traitementInsertion.php" enctype="multipart/form-data">
	<section >
	  <div class="container py-5 h-100">
	    <div class="row d-flex justify-content-center align-items-center h-100">
	      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
	        <div class="card bg-dark text-white" style="border-radius: 1rem;">
	          <div class="card-body p-5 text-center">

	            <div class="mb-md-5 mt-md-4 pb-5">

	              <h2 class="fw-bold mb-5">Ampidiro ny sarinao</h2>

	              <div class="form-outline form-white mb-4">
	                <input id="typeEmailX" type="file" name="fichier" class="form-control form-control-lg" />
	                <label class="form-label" for="typeEmailX">votre photo</label>
	              </div>

	              <div class="form-outline form-white mb-4">
	                <input type="text" name="motCle" id="typePasswordX" class="form-control form-control-lg" />
	                <label class="form-label" for="typePasswordX">mot clé</label>
	              </div>

	              <button class="btn btn-outline-light btn-lg px-5" type="submit">Enregistrer</button>

	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>
	</form>
</body>
</html>