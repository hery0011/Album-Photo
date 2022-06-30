<?php 
	/*session start*/
	session_start();
	if(isset($_SESSION['id']) && !is_null($_SESSION['id'])) {
		$UserId = $_SESSION['id'];
	} else {
		header('location: index.html');
	}
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "album_photo";

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
			$sql = "SELECT * FROM album where motCle LIKE '%$motCle%' && userId = $UserId";
		}elseif($daty && !$motCle){
			$sql = "SELECT * FROM album where date_insertion = '$daty' && userId = $UserId";
		}else{
			$sql = "SELECT * FROM album where date_insertion = '$daty' && motCle LIKE '%$motCle%' && userId = $UserId";
		}
			
	}
	else{
		$sql = "SELECT * FROM album where userId = $UserId ORDER BY id DESC LIMIT 21";
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
</head>
<body>

	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			  <!-- Brand -->
			  <a class="navbar-brand" href="#">Logo</a>

			  <!-- Links -->
			  <ul class="navbar-nav">
			    <li class="nav-item">
			      <a class="nav-link" href="insertion.html">Insertion Photo</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="affichage.php">Voir mon album</a>
			    </li>

			  </ul>
			</nav>
		</div>
	</div>


	<div class="row mt-3">
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
						<div class="gallery">
						  	<a href="<?php echo $row['file_url'] ?>">
						    	<img src="<?php echo $row['file_url'] ?>" width="250" height="250">
						  	</a>
						</div>
					<?php } }?>
		</div>
		<div class="col-md-1"></div>
	</div>

</body>
</html>