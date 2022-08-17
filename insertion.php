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

	<!-- JavaScript -->
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

	<!-- 
	    RTL version
	-->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
	<!-- Default theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
	<!-- Bootstrap theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>
		<!-- include the style -->
	<link rel="stylesheet" href="{PATH}/css/alertify.min.css" />
	<!-- include a theme -->
	<link rel="stylesheet" href="{PATH}/css/themes/default.min.css" />
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
	     <li class="nav-item">
	      <a class="nav-link" href="affichageVideo.php">Video</a>
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

	              <label>photo ou vidéo</label>
	               <select id="choseSelect" onchange="verification()">
 				  	<option></option>
	              	<option value="photo">photo</option>
	              	<option value="video">video</option>
	              </select><br><br><br>

	              <div class="form-outline form-white mb-4" hidden id="photo">
	                <input id="typeEmailX" type="file" name="fichier" class="form-control form-control-lg" />
	                <label class="form-label" for="typeEmailX">votre photo</label>
	              </div>

	              <div class="form-outline form-white mb-4" hidden id="video">
	                <input id="typeEmailX" type="file" accept="video/*" name="fichier_video" class="form-control form-control-lg" />
	                <label class="form-label" for="typeEmailX">votre video</label>
	              </div>

	              <div class="form-outline form-white mb-4">
	                <input type="text" name="motCle" id="typePasswordX" class="form-control form-control-lg" />
	                <label class="form-label" for="typePasswordX">mot clé</label>
	              </div>

 				 

	              <script type="text/javascript">
	              	function verification(){
		              	var photo = document.getElementById("choseSelect").value;
		              	
		              	if (photo == 'photo') {
		              		document.getElementById("photo").removeAttribute("hidden");
		              		document.getElementById("video").setAttribute("hidden", "true");  
		              	}

		              	if(photo == 'video'){
		              		document.getElementById("photo").setAttribute("hidden", "true"); 
		              		document.getElementById("video").removeAttribute("hidden"); 
		              	}
	              	}
	              </script>

	              <button class="btn btn-outline-light btn-lg px-5" onclick="sub()" type="submit">Enregistrer</button>
	              

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