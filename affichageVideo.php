<?php 
	/*session start*/
	session_start();
	if(isset($_SESSION['id']) && !is_null($_SESSION['id'])) {
		$UserId = $_SESSION['id'];
	} else {
		header('location: index.php');
	}
	
	/*configuration base*/
	require('config.php');

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$recherche = '';
	$motCle = '';

	if (isset($_POST['rechercheVal'])) {
		$date_insertion = $_POST['daty'];
		if ($date_insertion) {
			$ObjectName = new DateTime($date_insertion);
			$daty = $ObjectName->format('d/m/Y'); 
		}else{
			$daty = '';
		}
		
		$motCle = $_POST['motCle'];

	
		if($motCle && !$daty) {
			$sql = "SELECT * FROM album where motCle LIKE '%$motCle%' && userId = $UserId && type = 1";
		}elseif($daty && !$motCle){
			$sql = "SELECT * FROM album where date_insertion = '$daty' && userId = $UserId && type = 1";
		}else{
			$sql = "SELECT * FROM album where date_insertion = '$daty' && motCle LIKE '%$motCle%' && userId = $UserId && type = 1";
		}
			
	}
	else{
		$sql = "SELECT * FROM album where userId = $UserId && type = 1 ORDER BY id DESC LIMIT 8";
	}

	
	$result = $conn->query($sql);
		

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
			background-image: url('photo/fond1.jpg');
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
	      <a class="nav-link" href="insertion.php">Insertion</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="affichage.php">Album</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link active" href="affichageVideo.php">Video</a>
	    </li>
	  </ul>
	</div>


	<div class="row mt-5">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form method="POST" action="">
				<div>
					<div class="row">
						<div class="col-md-8">
							<input type="date" name="daty" class="form-control">
							<input type="text" name="motCle" class="form-control mt-1" placeholder="votre mot clé">
						</div>
						<div class="col-md-4 mt-3">
							<input type="submit" name="rechercheVal" value="Rechercher" class="btn btn-primary">
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>


	<div class="row mt-5">
		<div class="col-md-1"></div>
		<div class="col-md-10">
					<?php 
						if ($result->num_rows > 0) {
							 while($row = $result->fetch_assoc()) {
					?>
						<video width="320" height="240" controls>
							<source src="<?php echo $row['file_url'] ?>" type="video/mp4">
						</video>

					<?php } }?>
		</div>
		<div class="col-md-1"></div>
	</div>
</body>
</html>